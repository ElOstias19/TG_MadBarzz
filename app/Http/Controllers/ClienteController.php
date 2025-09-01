<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    // INDEX
    public function index()
    {
        $clientes = Cliente::with(['persona', 'user'])->get();
        return view('clientes.index', compact('clientes'));
    }

    // CREATE (Formulario para crear Persona, Usuario y Cliente)
    public function create()
    {
        // No necesitas traer personas ni usuarios si vas a crear todo nuevo
        return view('clientes.create');
    }

    // STORE (Registro combinado)
    public function store(Request $request)
    {
        $request->validate([
            // Persona
            'nombre_completo'    => 'required|string|max:255',
            'apellido_paterno'   => 'required|string|max:255',
            'apellido_materno'   => 'required|string|max:255',
            'ci'                 => 'required|unique:personas,ci',
            'telefono'           => 'required|unique:personas,telefono',
            'genero'             => 'required|in:masculino,femenino,otro',
            'fecha_nacimiento'   => 'required|date',

            // Usuario
            'name'               => 'required|string|max:100',
            'email'              => 'required|email|unique:users,email',
            'password'           => 'required|string|min:6|confirmed',
            // No pidas rol_id en formulario ni en validación

            // Cliente
            'dias_asistidos'     => 'required|integer|min:0',
            'huella_digital'     => 'nullable|string|max:255',
            'estado'             => 'required|in:activo,inactivo',
        ]);

        // Crear Persona
        $persona = Persona::create([
            'nombre_completo'    => $request->nombre_completo,
            'apellido_paterno'   => $request->apellido_paterno,
            'apellido_materno'   => $request->apellido_materno,
            'ci'                 => $request->ci,
            'telefono'           => $request->telefono,
            'genero'             => $request->genero,
            'fecha_nacimiento'   => $request->fecha_nacimiento,
        ]);

        // Crear Usuario con rol_id fijo = 1 (cliente)
        $usuario = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'rol_id'   => 1,
        ]);

        // Crear Cliente relacionado
        Cliente::create([
            'id_persona'     => $persona->id_persona,
            'dias_asistidos' => $request->dias_asistidos,
            'huella_digital' => $request->huella_digital,
            'estado'         => $request->estado,
            'id_usuario'     => $usuario->id,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente, persona y usuario registrados correctamente.');
    }

        // EDITAR cliente (solo datos de cliente, persona y usuario en sus tablas)
    public function edit($id)
    {
        $cliente = Cliente::with(['persona', 'user'])->findOrFail($id);

        if (!$cliente->persona || !$cliente->user) {
            return redirect()->route('clientes.index')->with('error', 'Este cliente no tiene relaciones completas.');
        }

        return view('clientes.edit', compact('cliente'));
    }


   // ACTUALIZAR datos
public function update(Request $request, $id)
{
    $cliente = Cliente::with(['persona', 'user'])->findOrFail($id);

    // Validamos que tenga relaciones
    if (!$cliente->persona || !$cliente->user) {
        return redirect()->back()->withErrors('El cliente no tiene asociada una persona o usuario.');
    }

    $persona = $cliente->persona;
    $usuario = $cliente->user;

    $request->validate([
        'nombre_completo'    => 'required|string|max:255',
        'apellido_paterno'   => 'required|string|max:255',
        'apellido_materno'   => 'required|string|max:255',
        'ci'                 => 'required|unique:personas,ci,' . $persona->id_persona . ',id_persona',
        'telefono'           => 'required|unique:personas,telefono,' . $persona->id_persona . ',id_persona',
        'genero'             => 'required|in:masculino,femenino,otro',
        'fecha_nacimiento'   => 'required|date',

        'name'               => 'required|string|max:100',
        'email'              => 'required|email|unique:users,email,' . $usuario->id . ',id',

        'dias_asistidos'     => 'required|integer|min:0',
        'huella_digital'     => 'nullable|string|max:255',
        'estado'             => 'required|in:activo,inactivo',
    ]);

    // Actualizar persona
    $persona->update([
        'nombre_completo'    => $request->nombre_completo,
        'apellido_paterno'   => $request->apellido_paterno,
        'apellido_materno'   => $request->apellido_materno,
        'ci'                 => $request->ci,
        'telefono'           => $request->telefono,
        'genero'             => $request->genero,
        'fecha_nacimiento'   => $request->fecha_nacimiento,
    ]);

    // Actualizar usuario
    $usuario->update([
        'name'  => $request->name,
        'email' => $request->email,
    ]);

    if ($request->filled('password')) {
        $usuario->update([
            'password' => Hash::make($request->password),
        ]);
    }

    // Actualizar cliente
    $cliente->update([
        'dias_asistidos' => $request->dias_asistidos,
        'huella_digital' => $request->huella_digital,
        'estado'         => $request->estado,
    ]);

    return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
}


    // ELIMINAR cliente (eliminación física o lógica)
public function destroy(Cliente $cliente)
{
    $cliente->delete(); // solo elimina lógicamente
    return redirect()->route('clientes.index')->with('success', 'Cliente eliminado lógicamente.');
}

}
