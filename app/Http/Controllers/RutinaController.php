<?php

namespace App\Http\Controllers;

use App\Models\Rutina;
use App\Models\Entrenador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;

class RutinaController extends Controller
{
    # =================== INDEX (ADMIN) ===================
    public function index()
    {
        $rutinas = Rutina::with('entrenador.persona')->latest()->get();
        return view('rutinas.index', compact('rutinas'));
    }

    # =================== CREATE ===================
    public function create()
    {
        $entrenadores = Entrenador::with('persona')->get();
        return view('rutinas.create', compact('entrenadores'));
    }

    # =================== STORE ===================
    public function store(Request $request)
    {
        $request->validate([
            'id_entrenador' => 'required|exists:entrenadores,id_entrenador',
            'titulo'        => 'required|string|max:255',
            'descripcion'   => 'nullable|string',
            'archivo'       => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:10240',
        ]);

        $data = $request->only(['id_entrenador', 'titulo', 'descripcion']);
        $data['fecha_subida'] = now();

        if ($request->hasFile('archivo')) {
            $filename = time() . '_' . $request->file('archivo')->getClientOriginalName();
            $request->file('archivo')->storeAs('rutinas', $filename, 'public');
            $data['archivo'] = 'rutinas/' . $filename;
        }

        Rutina::create($data);

        return redirect()->route('rutinas.index')->with('success', 'Rutina subida correctamente.');
    }

    # =================== EDIT ===================
    public function edit(Rutina $rutina)
    {
        $entrenadores = Entrenador::with('persona')->get();
        return view('rutinas.edit', compact('rutina', 'entrenadores'));
    }

    # =================== UPDATE ===================
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
            if ($rutina->archivo && Storage::disk('public')->exists($rutina->archivo)) {
                Storage::disk('public')->delete($rutina->archivo);
            }

            $filename = time() . '_' . $request->file('archivo')->getClientOriginalName();
            $request->file('archivo')->storeAs('rutinas', $filename, 'public');
            $data['archivo'] = 'rutinas/' . $filename;
            $data['fecha_subida'] = now();
        }

        $rutina->update($data);

        return redirect()->route('rutinas.index')->with('success', 'Rutina actualizada correctamente.');
    }

    # =================== DESTROY ===================
    public function destroy(Rutina $rutina)
    {
        if ($rutina->archivo && Storage::disk('public')->exists($rutina->archivo)) {
            Storage::disk('public')->delete($rutina->archivo);
        }

        $rutina->delete();

        return redirect()->route('rutinas.index')->with('success', 'Rutina eliminada correctamente.');
    }

    # =================== SHOW (GENERAL) ===================
    public function show()
    {
        // 🔹 Ahora muestra TODAS las rutinas a los clientes, sin importar asignación
        $rutinas = Rutina::with('entrenador.persona')->latest()->get();

        return view('rutinas.show', compact('rutinas'));
    }


    # =================== VER RUTINA DETALLE ===================
    public function verRutina($id)
    {
        $rutina = Rutina::with('entrenador.persona')->findOrFail($id);
        return view('rutinas.verrutina', compact('rutina'));
    }
}
