<?php

namespace App\Http\Controllers;

use App\Models\Rutina;
use App\Models\Entrenador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RutinaController extends Controller
{
    public function index()
    {
        $rutinas = Rutina::with('entrenador.persona')->latest()->get();
        return view('rutinas.index', compact('rutinas'));
    }

    public function create()
    {
        // Traer entrenadores con su persona para mostrar nombre
        $entrenadores = Entrenador::with('persona')->get();
        return view('rutinas.create', compact('entrenadores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_entrenador' => 'required|exists:entrenadores,id_entrenador',
            'titulo'        => 'required|string|max:255',
            'descripcion'   => 'nullable|string',
            'archivo'       => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:10240', // 10MB
        ]);

        $data = $request->only(['id_entrenador', 'titulo', 'descripcion']);
        $data['fecha_subida'] = now();

        // Guardar archivo si existe
        if ($request->hasFile('archivo')) {
            $filename = time() . '_' . $request->file('archivo')->getClientOriginalName();
            $request->file('archivo')->storeAs('rutinas', $filename, 'public');
            $data['archivo'] = $filename;
        }

        Rutina::create($data);

        return redirect()->route('rutinas.index')->with('success', 'Rutina subida correctamente.');
    }

    public function show(Rutina $rutina)
    {
        return view('rutinas.show', compact('rutina'));
    }

    public function edit(Rutina $rutina)
    {
        $entrenadores = Entrenador::with('persona')->get();
        return view('rutinas.edit', compact('rutina', 'entrenadores'));
    }

    public function update(Request $request, Rutina $rutina)
    {
        $request->validate([
            'id_entrenador' => 'required|exists:entrenadores,id_entrenador',
            'titulo'        => 'required|string|max:255',
            'descripcion'   => 'nullable|string',
            'archivo'       => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:10240',
        ]);

        $data = $request->only(['id_entrenador', 'titulo', 'descripcion']);

        if ($request->hasFile('archivo')) {
            // Borrar archivo anterior
            if ($rutina->archivo && Storage::disk('public')->exists('rutinas/' . $rutina->archivo)) {
                Storage::disk('public')->delete('rutinas/' . $rutina->archivo);
            }

            // Subir nuevo archivo
            $filename = time() . '_' . $request->file('archivo')->getClientOriginalName();
            $request->file('archivo')->storeAs('rutinas', $filename, 'public');
            $data['archivo'] = $filename;
            $data['fecha_subida'] = now();
        }

        $rutina->update($data);

        return redirect()->route('rutinas.index')->with('success', 'Rutina actualizada correctamente.');
    }

    public function destroy(Rutina $rutina)
    {
        if ($rutina->archivo && Storage::disk('public')->exists('rutinas/' . $rutina->archivo)) {
            Storage::disk('public')->delete('rutinas/' . $rutina->archivo);
        }
        $rutina->delete();

        return redirect()->route('rutinas.index')->with('success', 'Rutina eliminada correctamente.');
    }
}
