<?php

namespace App\Http\Controllers;

use App\Models\MembresiaCliente;
use App\Models\Cliente;
use App\Models\Membresia;
use Illuminate\Http\Request;

class MembresiaClienteController extends Controller
{
    // LISTAR
    public function index()
    {
        $membresiasClientes = MembresiaCliente::with(['cliente.persona', 'membresia'])->get();

        return view('membresia_cliente.index', compact('membresiasClientes'));
    }

    // FORMULARIO CREAR
    public function create()
    {
        // ✅ Obtener todos los clientes que NO tienen una membresía activa
        $clientes = Cliente::whereDoesntHave('membresias', function ($query) {
            $query->where('fecha_fin', '>=', now());
        })
        ->with('persona')
        ->get();

        // ✅ Obtener todas las membresías
        $membresias = Membresia::all();

        return view('membresia_cliente.create', compact('clientes', 'membresias'));
    }

    // GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente'       => 'required|exists:clientes,id_cliente',
            'id_membresia'     => 'required|exists:membresias,id_membresia',
            'fecha_inicio'     => 'required|date',
            'fecha_fin'        => 'required|date|after_or_equal:fecha_inicio',
            'nombre_descuento' => 'nullable|string|max:100',
            'descuento'        => 'nullable|numeric|min:0|max:100',
        ]);

        $membresia = Membresia::findOrFail($request->id_membresia);
        $precioBase = $membresia->precio;

        $precioFinal = $precioBase;
        if ($request->filled('descuento')) {
            $precioFinal = $precioBase - ($precioBase * ($request->descuento / 100));
        }

        MembresiaCliente::create([
            'id_cliente'       => $request->id_cliente,
            'id_membresia'     => $request->id_membresia,
            'fecha_inicio'     => $request->fecha_inicio,
            'fecha_fin'        => $request->fecha_fin,
            'nombre_descuento' => $request->nombre_descuento,
            'descuento'        => $request->descuento,
            'precio_final'     => $precioFinal,
        ]);

        return redirect()->route('membresia_cliente.index')
            ->with('success', 'Membresía asignada al cliente correctamente.');
    }

    // FORMULARIO EDITAR
    public function edit($id)
    {
        $membresiaCliente = MembresiaCliente::findOrFail($id);
        $clientes = Cliente::with('persona')->get();
        $membresias = Membresia::all();

        return view('membresia_cliente.edit', compact('membresiaCliente', 'clientes', 'membresias'));
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_cliente'       => 'required|exists:clientes,id_cliente',
            'id_membresia'     => 'required|exists:membresias,id_membresia',
            'fecha_inicio'     => 'required|date',
            'fecha_fin'        => 'required|date|after_or_equal:fecha_inicio',
            'nombre_descuento' => 'nullable|string|max:100',
            'descuento'        => 'nullable|numeric|min:0|max:100',
        ]);

        $membresia = Membresia::findOrFail($request->id_membresia);
        $precioBase = $membresia->precio;

        $precioFinal = $precioBase;
        if ($request->filled('descuento')) {
            $precioFinal = $precioBase - ($precioBase * ($request->descuento / 100));
        }

        $membresiaCliente = MembresiaCliente::findOrFail($id);
        $membresiaCliente->update([
            'id_cliente'       => $request->id_cliente,
            'id_membresia'     => $request->id_membresia,
            'fecha_inicio'     => $request->fecha_inicio,
            'fecha_fin'        => $request->fecha_fin,
            'nombre_descuento' => $request->nombre_descuento,
            'descuento'        => $request->descuento,
            'precio_final'     => $precioFinal,
        ]);

        return redirect()->route('membresia_cliente.index')
            ->with('success', 'Membresía del cliente actualizada correctamente.');
    }

    // ELIMINAR LÓGICAMENTE
    public function destroy($id)
    {
        $membresiaCliente = MembresiaCliente::findOrFail($id);
        $membresiaCliente->delete();

        return redirect()->route('membresia_cliente.index')
            ->with('success', 'Membresía del cliente eliminada correctamente.');
    }
}
    