<?php

namespace App\Http\Controllers;

use App\Models\Membresia;
use Illuminate\Http\Request;

class MembresiaController extends Controller
{
    public function index()
    {
        $membresias = Membresia::whereNull('deleted_at')->get();
        return view('membresias.index', compact('membresias'));
    }

    public function create()
    {
        return view('membresias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_membresia' => 'required|string|max:50',
            'precio' => 'required|numeric|min:0',
        ]);

        Membresia::create($request->all());

        return redirect()->route('membresias.index')->with('success', 'Membresía creada correctamente.');
    }

    public function edit($id)
    {
        $membresia = Membresia::findOrFail($id);
        return view('membresias.edit', compact('membresia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_membresia' => 'required|string|max:50',
            'precio' => 'required|numeric|min:0',
        ]);

        $membresia = Membresia::findOrFail($id);
        $membresia->update($request->all());

        return redirect()->route('membresias.index')->with('success', 'Membresía actualizada correctamente.');
    }

    public function destroy($id)
    {
        $membresia = Membresia::findOrFail($id);
        $membresia->delete();

        return redirect()->route('membresias.index')->with('success', 'Membresía eliminada correctamente.');
    }
}
