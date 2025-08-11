<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Cliente;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    // Mostrar todas las asistencias (index)
    public function index()
    {
        // Trae todas las asistencias con los datos del cliente y persona relacionados
        $asistencias = Asistencia::with('cliente.persona')->orderBy('fecha_hora_entrada', 'desc')->get();

        return view('asistencias.index', compact('asistencias'));
    }

    // Formulario para registrar nueva asistencia (opcional si usas lector huella directo)
    public function create()
    {
        // Obtener clientes activos para seleccionar
        $clientes = Cliente::where('estado', 'activo')->get();
        return view('asistencias.create', compact('clientes'));
    }

    // Guardar nueva asistencia con huella recibida
    public function store(Request $request)
    {
        // Validar que la huella digital (o algún identificador único) exista y que el cliente esté activo
        $request->validate([
            'huella_digital' => 'required|string',
        ]);

        // Buscar cliente por huella digital
        $cliente = Cliente::where('huella_digital', $request->huella_digital)
                          ->where('estado', 'activo')
                          ->first();

        if (!$cliente) {
            return redirect()->back()->withErrors(['huella_digital' => 'Huella no registrada o cliente inactivo.']);
        }

        // Registrar la asistencia con la fecha y hora actual
        Asistencia::create([
            'id_cliente' => $cliente->id_cliente,
            'fecha_hora_entrada' => now(), // fecha y hora actual del sistema
        ]);

        return redirect()->route('asistencias.index')->with('success', 'Asistencia registrada correctamente para ' . $cliente->persona->nombre_completo);
    }

    // Mostrar detalles de una asistencia (opcional)
    public function show($id)
    {
        $asistencia = Asistencia::with('cliente.persona')->findOrFail($id);
        return view('asistencias.show', compact('asistencia'));
    }

    // Opcional: no implementamos editar ni eliminar para asistencias (puedes agregar si quieres)
}
