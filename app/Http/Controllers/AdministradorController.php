<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{
    public function index()
    {
        $administradores = Administrador::with(['persona', 'user'])->get();
        return view('administradores.index', compact('administradores'));
    }

    public function create()
    {
        return view('administradores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Validación persona
            'nombre_completo'  => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'ci'               => 'required|string|max:20|unique:personas,ci',
            'telefono'         => 'nullable|string|max:20|unique:personas,telefono',
            'genero'           => 'required|in:masculino,femenino,otro',
            'fecha_nacimiento' => 'required|date',

            // Validación usuario
            'name'     => 'required|string|max:255|unique:users,name',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',

            // Validación administrador
            'nivel_acceso'    => 'required|in:superadmin,gestion,finanzas',
            'area_responsable' => 'required|string|max:255',
            'estado'          => 'required|in:activo,inactivo',
        ]);

        $persona = Persona::create($request->only([
            'nombre_completo', 'apellido_paterno', 'apellido_materno',
            'ci', 'telefono', 'genero', 'fecha_nacimiento'
        ]));

        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol_id' => 1, // Asumo 1 para administrador
        ]);

        Administrador::create([
            'id_persona' => $persona->id_persona,
            'id_usuario' => $usuario->id,
            'nivel_acceso' => $request->nivel_acceso,
            'area_responsable' => $request->area_responsable,
            'estado' => $request->estado,
        ]);

        return redirect()->route('administradores.index')->with('success', 'Administrador creado correctamente.');
    }

    public function edit($id)
    {
        $administrador = Administrador::with(['persona', 'user'])->findOrFail($id);
        return view('administradores.edit', compact('administrador'));
    }

    public function update(Request $request, $id)
    {
        $administrador = Administrador::with(['persona', 'user'])->findOrFail($id);

        $request->validate([
            'nombre_completo'  => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'ci'               => 'required|string|max:20|unique:personas,ci,' . $administrador->persona->id_persona . ',id_persona',
            'telefono'         => 'nullable|string|max:20|unique:personas,telefono,' . $administrador->persona->id_persona . ',id_persona',
            'genero'           => 'required|in:masculino,femenino,otro',
            'fecha_nacimiento' => 'required|date',

            'name'  => 'required|string|max:255|unique:users,name,' . $administrador->user->id,
            'email' => 'required|email|unique:users,email,' . $administrador->user->id,

            'nivel_acceso'    => 'required|in:superadmin,gestion,finanzas',
            'area_responsable' => 'required|string|max:255',
            'estado'          => 'required|in:activo,inactivo',
        ]);

        $administrador->persona->update($request->only([
            'nombre_completo', 'apellido_paterno', 'apellido_materno',
            'ci', 'telefono', 'genero', 'fecha_nacimiento'
        ]));

        $usuarioData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $usuarioData['password'] = Hash::make($request->password);
        }

        $administrador->user->update($usuarioData);

        $administrador->update([
            'nivel_acceso'    => $request->nivel_acceso,
            'area_responsable' => $request->area_responsable,
            'estado'          => $request->estado,
        ]);

        return redirect()->route('administradores.index')->with('success', 'Administrador actualizado correctamente.');
    }

    public function destroy($id)
    {
        $administrador = Administrador::findOrFail($id);
        $administrador->deleted_at = now(); // marca como eliminado
        $administrador->save();

        return redirect()->route('administradores.index')->with('success', 'Administrador eliminado correctamente.');
    }

}
