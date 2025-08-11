<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\WhatsappService;

class NotificacionController extends Controller
{
    // Mostrar listado de notificaciones con cliente y persona cargados
    public function index()
    {
        $notificaciones = Notificacion::with('cliente.persona')->orderBy('created_at', 'desc')->get();
        return view('notificaciones.index', compact('notificaciones'));
    }

    // Formulario para crear una notificación (enviar mensaje)
    public function create()
    {
        $clientes = Cliente::with('persona')->get();
        return view('notificaciones.create', compact('clientes'));
    }

    // Formulario alternativo para enviar mensaje WhatsApp directamente
    public function showForm()
    {
        $clientes = Cliente::with('persona')->get();
        return view('notificaciones.send', compact('clientes'));
    }

    // Método para enviar WhatsApp (formulario send)
    public function sendWhatsapp(Request $request, WhatsappService $whatsappService)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'mensaje' => 'required|string|max:500',
        ]);

        $cliente = Cliente::with('persona')->findOrFail($request->id_cliente);

        $telefono = $cliente->persona->telefono ?? null;
        if (!$telefono) {
            return redirect()->back()->with('error', 'El cliente no tiene teléfono registrado.');
        }

        $numeroWhatsApp = $this->formatearTelefonoWhatsApp($telefono);

        try {
            $enviado = $whatsappService->sendMessage($numeroWhatsApp, $request->mensaje);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error enviando WhatsApp: ' . $e->getMessage());
        }

        Notificacion::create([
            'id_cliente' => $cliente->id_cliente,
            'tipo' => 'recordatorio_vencimiento',
            'mensaje' => $request->mensaje,
            'fecha_envio' => now(),
            'estado' => $enviado ? 'enviado' : 'fallido',
        ]);

        if ($enviado) {
            return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
        } else {
            return redirect()->back()->with('error', 'Error al enviar el mensaje.');
        }
    }

    // Guardar notificación con tipo dinámico (formulario create)
    public function store(Request $request, WhatsappService $whatsapp)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'tipo'       => 'required|in:recordatorio_vencimiento,bienvenida,promocion',
            'mensaje'    => 'required|string',
        ]);

        $cliente = Cliente::with('persona')->findOrFail($request->id_cliente);

        $telefonoCliente = $cliente->persona->telefono ?? null;
        if (!$telefonoCliente) {
            return redirect()->back()->withErrors(['id_cliente' => 'El cliente no tiene teléfono registrado.']);
        }

        $numeroWhatsApp = $this->formatearTelefonoWhatsApp($telefonoCliente);

        $notificacion = Notificacion::create([
            'id_cliente' => $request->id_cliente,
            'tipo'       => $request->tipo,
            'mensaje'    => $request->mensaje,
        ]);

        try {
            $enviado = $whatsapp->sendMessage($numeroWhatsApp, $request->mensaje);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error enviando WhatsApp: ' . $e->getMessage());
        }

        $notificacion->fecha_envio = Carbon::now();
        $notificacion->estado = $enviado ? 'enviado' : 'fallido';
        $notificacion->save();

        $mensajeRespuesta = $enviado ? 'Notificación enviada correctamente.' : 'Error al enviar la notificación.';

        return redirect()->route('notificaciones.index')->with('success', $mensajeRespuesta);
    }

    // Función para formatear teléfono para WhatsApp (agrega 'whatsapp:' y +591 si falta)
    private function formatearTelefonoWhatsApp($telefono)
    {
        // Solo números y +
        $soloNumeros = preg_replace('/[^0-9+]/', '', $telefono);

        if (strpos($soloNumeros, '+') !== 0) {
            // Agrega +591 (Bolivia) si no tiene código país
            $soloNumeros = '+591' . $soloNumeros;
        }

        return 'whatsapp:' . $soloNumeros;
    }
}
