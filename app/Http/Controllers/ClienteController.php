<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // INDEX
 public function index()
{
    $clientes = Cliente::with(['persona', 'usuario'])->get();
    return view('clientes.index', compact('clientes'));
}





    // CREATE
    public function create()
    {
        $personas = Persona::all();
        $usuarios = User::all();
        return view('clientes.create', compact('personas', 'usuarios'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id_persona',
            'dias_asistidos' => 'required|integer|min:0',
            'id_usuario' => 'required|exists:users,id',
        ]);

        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    // EDIT
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $personas = Persona::all();
        $usuarios = User::all();
        return view('clientes.edit', compact('cliente', 'personas', 'usuarios'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id_persona',
            'dias_asistidos' => 'required|integer|min:0',
            'id_usuario' => 'required|exists:users,id',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    // DESTROY (eliminación lógica)
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
