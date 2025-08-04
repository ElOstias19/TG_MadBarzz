<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // =========================
    // Mostrar todos los usuarios (excepto los eliminados)
    // =========================
    public function index()
    {
            $usuarios = User::all();
        return view('users.index', compact('usuarios'));
    }

    // =========================
    // Mostrar formulario para crear
    // =========================
        public function create()
        {
            $roles = Rol::all(); // Trae todos los roles desde la tabla 'rols' o 'roles'
            return view('users.create', compact('roles'));
        }


    // =========================
    // Guardar nuevo usuario
            // =========================
        public function store(Request $request)
        {
            $request->validate([
                'name'     => 'required|string|max:100',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
                'rol_id'   => 'required|exists:roles,id',
            ]);

            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'rol_id'   => $request->rol_id,
            ]);

            return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
        }


    // =========================
    // Mostrar formulario para editar
    // =========================
    public function edit($id)
    {
        $usuario = User::findOrFail($id);  // Esto lanza 404 si no existe
        $roles = Rol::all();

        return view('users.edit', compact('usuario', 'roles'));
    }



    // =========================
    // Actualizar usuario
    // =========================
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:100',
            'email'  => 'required|email|unique:users,email,' . $usuario->id,
            'rol_id' => 'required|exists:roles,id',
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->rol_id = $request->rol_id;

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'confirmed|min:6',
            ]);
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // =========================
    // Eliminación lógica del usuario
    // =========================
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();


        return redirect()->route('users.index')->with('success', 'Usuario eliminado lógicamente.');
    }
}
