<?php

// app/Http/Controllers/PersonaController.php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
   public function index()
    {
        $personas = Persona::all(); // SoftDeletes ya filtra los eliminados
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'ci' => 'required|unique:personas',
            'telefono' => 'required|unique:personas',
            'genero' => 'required',
            'fecha_nacimiento' => 'required|date'
        ]);

        Persona::create($request->all());

        return redirect()->route('personas.index')->with('success', 'Persona registrada');
    }

    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.edit', compact('persona'));
    }



    public function update(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);
        $persona->update($request->all());

        return redirect()->route('personas.index')->with('success', 'Persona actualizada');
    }


    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete(); // ✅ esto NO elimina físicamente, solo pone deleted_at
        return redirect()->route('personas.index')->with('success', 'Persona eliminada lógicamente.');
    }

}

