<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EntrenadorController extends Controller
{
    public function index()
    {
        $entrenadores = Entrenador::with(['persona', 'user'])->get();
        return view('entrenadores.index', compact('entrenadores'));
    }

    public function create()
    {
        return view('entrenadores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Persona
            'nombre_completo'  => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'ci'               => 'required|unique:personas,ci',
            'telefono'         => 'required|unique:personas,telefono',
            'genero'           => 'required|in:masculino,femenino,otro',
            'fecha_nacimiento' => 'required|date',

            // Usuario
            'name'             => 'required|string|max:100',
            'email'            => 'required|email|unique:users,email',
            'password'         => 'required|string|min:6|confirmed',

            // Entrenador
            'especialidad'     => 'required|array|min:1',
            'experiencia'      => 'required|string|max:255',
            'disponibilidad'   => 'required|array|min:1',
            'estado'           => 'required|in:activo,inactivo',
        ]);

        $persona = Persona::create([
            'nombre_completo'  => $request->nombre_completo,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'ci'               => $request->ci,
            'telefono'         => $request->telefono,
            'genero'           => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
        ]);

        $usuario = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'rol_id'   => 2, // Entrenador
        ]);

        Entrenador::create([
            'id_persona'     => $persona->id_persona,
            'id_usuario'     => $usuario->id,
            'especialidad'   => implode(', ', $request->especialidad),
            'experiencia'    => $request->experiencia,
            'disponibilidad' => json_encode($request->disponibilidad),
            'estado'         => $request->estado,
        ]);

        return redirect()->route('entrenadores.index')->with('success', 'Entrenador registrado correctamente.');
    }

    public function edit($id)
    {
        $entrenador = Entrenador::with(['persona', 'user'])->findOrFail($id);

        // Pasar arrays para los selects múltiples
        $entrenador->disponibilidad = json_decode($entrenador->disponibilidad, true);
        $entrenador->especialidad = explode(', ', $entrenador->especialidad ?? '');

        return view('entrenadores.edit', compact('entrenador'));
    }

    public function update(Request $request, $id)
    {
        $entrenador = Entrenador::with(['persona', 'user'])->findOrFail($id);
        $persona = $entrenador->persona;
        $usuario = $entrenador->user;

        $request->validate([
            'nombre_completo'  => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'ci'               => 'required|unique:personas,ci,' . $persona->id_persona . ',id_persona',
            'telefono'         => 'required|unique:personas,telefono,' . $persona->id_persona . ',id_persona',
            'genero'           => 'required|in:masculino,femenino,otro',
            'fecha_nacimiento' => 'required|date',

            'name'             => 'required|string|max:100',
            'email'            => 'required|email|unique:users,email,' . $usuario->id . ',id',

            'especialidad'     => 'required|array|min:1',
            'experiencia'      => 'required|string|max:255',
            'disponibilidad'   => 'required|array|min:1',
            'estado'           => 'required|in:activo,inactivo',
        ]);

        $persona->update([
            'nombre_completo'  => $request->nombre_completo,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'ci'               => $request->ci,
            'telefono'         => $request->telefono,
            'genero'           => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
        ]);

        $usuario->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $usuario->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $entrenador->update([
            'especialidad'   => implode(', ', $request->especialidad),
            'experiencia'    => $request->experiencia,
            'disponibilidad' => json_encode($request->disponibilidad),
            'estado'         => $request->estado,
        ]);

        return redirect()->route('entrenadores.index')->with('success', 'Entrenador actualizado correctamente.');
    }

    public function destroy($id)
    {
        Entrenador::findOrFail($id)->delete();
        return redirect()->route('entrenadores.index')->with('success', 'Entrenador eliminado correctamente.');
    }
}
