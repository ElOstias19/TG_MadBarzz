<?php

namespace App\Http\Controllers;

use App\Models\Recepcionista;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RecepcionistaController extends Controller
{
    public function index()
    {
        $recepcionistas = Recepcionista::with(['persona', 'user'])->get();
        return view('recepcionistas.index', compact('recepcionistas'));
    }

    public function create()
    {
        return view('recepcionistas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'ci' => 'required|string|max:20|unique:personas,ci',
            'telefono' => 'nullable|string|max:20|unique:personas,telefono',
            'genero' => 'required|in:masculino,femenino,otro',
            'fecha_nacimiento' => 'required|date',

            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',

            'turno' => 'required|in:mañana,tarde,noche',
            'punto_atencion' => 'required|string|max:255',
            'estado' => 'required|in:activo,inactivo'
        ], [
            'ci.unique' => 'La cédula ya está registrada.',
            'telefono.unique' => 'El teléfono ya está registrado.',
            'name.unique' => 'El nombre de usuario ya está en uso.',
            'email.unique' => 'El correo electrónico ya está registrado.',
        ]);

        $persona = Persona::create($request->only([
            'nombre_completo', 'apellido_paterno', 'apellido_materno', 'ci', 'telefono', 'genero', 'fecha_nacimiento'
        ]));

        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol_id' => 3 // Rol recepcionista
        ]);

        Recepcionista::create([
            'id_persona' => $persona->id_persona,
            'id_usuario' => $usuario->id,
            'turno' => $request->turno,
            'punto_atencion' => $request->punto_atencion,
            'estado' => $request->estado
        ]);

        return redirect()->route('recepcionistas.index')->with('success', 'Recepcionista creado correctamente.');
    }

    public function edit($id)
    {
        $recepcionista = Recepcionista::with(['persona', 'user'])->findOrFail($id);
        return view('recepcionistas.edit', compact('recepcionista'));
    }

    public function update(Request $request, $id)
    {
        $recepcionista = Recepcionista::with(['persona', 'user'])->findOrFail($id);

        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'ci' => 'required|string|max:20|unique:personas,ci,' . $recepcionista->persona->id_persona . ',id_persona',
            'telefono' => 'nullable|string|max:20|unique:personas,telefono,' . $recepcionista->persona->id_persona . ',id_persona',
            'genero' => 'required|in:masculino,femenino,otro',
            'fecha_nacimiento' => 'required|date',

            'name' => 'required|string|max:255|unique:users,name,' . $recepcionista->user->id,
            'email' => 'required|email|unique:users,email,' . $recepcionista->user->id,

            'turno' => 'required|in:mañana,tarde,noche',
            'punto_atencion' => 'required|string|max:255',
            'estado' => 'required|in:activo,inactivo'
        ], [
            'ci.unique' => 'La cédula ya está registrada.',
            'telefono.unique' => 'El teléfono ya está registrado.',
            'name.unique' => 'El nombre de usuario ya está en uso.',
            'email.unique' => 'El correo electrónico ya está registrado.',
        ]);

        // Actualiza persona
        $recepcionista->persona->update($request->only([
            'nombre_completo', 'apellido_paterno', 'apellido_materno', 'ci', 'telefono', 'genero', 'fecha_nacimiento'
        ]));

        // Actualiza usuario (sin cambiar contraseña si no se envía)
        $usuarioData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $usuarioData['password'] = Hash::make($request->password);
        }

        $recepcionista->user->update($usuarioData);

        // Actualiza recepcionista
        $recepcionista->update([
            'turno' => $request->turno,
            'punto_atencion' => $request->punto_atencion,
            'estado' => $request->estado
        ]);

        return redirect()->route('recepcionistas.index')->with('success', 'Recepcionista actualizado correctamente.');
    }

    public function destroy($id)
    {
        $recepcionista = Recepcionista::findOrFail($id);
        $recepcionista->delete();

        return redirect()->route('recepcionistas.index')->with('success', 'Recepcionista eliminado correctamente.');
    }
}
