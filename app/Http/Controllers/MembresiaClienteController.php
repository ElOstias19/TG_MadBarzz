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
        $membresiasClientes = MembresiaCliente::with(['cliente.persona', 'membresia'])
            ->whereNull('deleted_at')
            ->get();

        return view('membresia_cliente.index', compact('membresiasClientes'));
    }

    // FORMULARIO CREAR
    public function create()
    {
        $clientes = Cliente::with('persona')->get();
        $membresias = Membresia::all();

        return view('membresia_cliente.create', compact('clientes', 'membresias'));
    }

    // GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_membresia' => 'required|exists:membresias,id_membresia',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        MembresiaCliente::create($request->all());

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
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_membresia' => 'required|exists:membresias,id_membresia',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $membresiaCliente = MembresiaCliente::findOrFail($id);
        $membresiaCliente->update($request->all());

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
