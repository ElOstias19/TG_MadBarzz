<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Cliente;
use App\Models\Membresia;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with(['cliente.persona', 'membresia'])->latest()->get();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        $clientes = Cliente::with('persona')->get();
        $membresias = Membresia::all();
        return view('pagos.create', compact('clientes', 'membresias'));
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

    public function edit(Pago $pago)
    {
        $clientes = Cliente::with('persona')->get();
        $membresias = Membresia::all();
        return view('pagos.edit', compact('pago', 'clientes', 'membresias'));
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
            // Solo marca el registro como eliminado en deleted_at
            $pago->delete();

            return redirect()->route('pagos.index')->with('success', 'Pago eliminado correctamente.');
        }

}
