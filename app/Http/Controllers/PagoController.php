<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with(['cliente.persona', 'membresia'])->latest()->get();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        // Obtener clientes con su última membresía asignada
        $clientes = Cliente::with(['persona', 'membresiasClientes.membresia'])->get();

        return view('pagos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_cliente'    => 'required|exists:clientes,id_cliente',
            'id_membresia'  => 'required|exists:membresias,id_membresia',
            'monto'         => 'required|numeric|min:0',
            'fecha_pago'    => 'required|date',
            'metodo_pago'   => 'required|in:efectivo,transferencia,QR',
            'observaciones' => 'nullable|string',
            'imagen_qr'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('imagen_qr')) {
            $validated['imagen_qr'] = $request->file('imagen_qr')->store('qrs', 'public');
        }

        Pago::create($validated);

        return redirect()->route('pagos.index')->with('success', 'Pago registrado correctamente.');
    }

    public function show($id)
    {
        $pago = Pago::with(['cliente.persona', 'membresia'])->findOrFail($id);
        return view('pagos.show', compact('pago'));
    }

    public function misPagos()
    {
        $cliente = Cliente::where('id_usuario', Auth::id())->first();

        if (!$cliente) {
            return redirect()->back()->with('error', 'No tienes un perfil de cliente asociado.');
        }

        $pagos = Pago::with('membresia')
                    ->where('id_cliente', $cliente->id_cliente)
                    ->orderBy('fecha_pago', 'desc')
                    ->get();

        return view('pagos.mis-pagos', compact('pagos', 'cliente'));
    }

    public function edit(Pago $pago)
    {
        // Clientes con su última membresía asignada
        $clientes = Cliente::with(['persona', 'membresiasClientes.membresia'])->get();

        return view('pagos.edit', compact('pago', 'clientes'));
    }

    public function update(Request $request, Pago $pago)
    {
        $validated = $request->validate([
            'id_cliente'    => 'required|exists:clientes,id_cliente',
            'id_membresia'  => 'required|exists:membresias,id_membresia',
            'monto'         => 'required|numeric|min:0',
            'fecha_pago'    => 'required|date',
            'metodo_pago'   => 'required|in:efectivo,transferencia,QR',
            'observaciones' => 'nullable|string',
            'imagen_qr'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('imagen_qr')) {
            if ($pago->imagen_qr && file_exists(storage_path('app/public/' . $pago->imagen_qr))) {
                unlink(storage_path('app/public/' . $pago->imagen_qr));
            }
            $validated['imagen_qr'] = $request->file('imagen_qr')->store('qrs', 'public');
        }

        $pago->update($validated);

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado correctamente.');
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();

        return redirect()->route('pagos.index')->with('success', 'Pago eliminado correctamente.');
    }
}
