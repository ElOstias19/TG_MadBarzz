<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use App\Models\User;
use App\Models\MembresiaCliente;
use App\Models\Asistencia;
use App\Models\Pago;
use App\Models\Rutina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    // INDEX
    public function index()
    {
        $clientes = Cliente::with(['persona', 'user'])->get();
        return view('clientes.index', compact('clientes'));
    }

    // CREATE
    public function create()
    {
        return view('clientes.create');
    }

    // STORE
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

            // Cliente
            'dias_asistidos'     => 'required|integer|min:0',
            'huella_digital'     => 'nullable|string|max:255',
            'estado'             => 'required|in:activo,inactivo',
        ]);

        $persona = Persona::create([
            'nombre_completo'    => $request->nombre_completo,
            'apellido_paterno'   => $request->apellido_paterno,
            'apellido_materno'   => $request->apellido_materno,
            'ci'                 => $request->ci,
            'telefono'           => $request->telefono,
            'genero'             => $request->genero,
            'fecha_nacimiento'   => $request->fecha_nacimiento,
        ]);

        $usuario = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'rol_id'   => 1, // Rol cliente
        ]);

        Cliente::create([
            'id_persona'     => $persona->id_persona,
            'dias_asistidos' => $request->dias_asistidos,
            'huella_digital' => $request->huella_digital,
            'estado'         => $request->estado,
            'id_usuario'     => $usuario->id,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente, persona y usuario registrados correctamente.');
    }

    // EDIT
    public function edit($id)
    {
        $cliente = Cliente::with(['persona', 'user'])->findOrFail($id);

        if (!$cliente->persona || !$cliente->user) {
            return redirect()->route('clientes.index')->with('error', 'Este cliente no tiene relaciones completas.');
        }

        return view('clientes.edit', compact('cliente'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $cliente = Cliente::with(['persona', 'user'])->findOrFail($id);
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

        $persona->update([
            'nombre_completo'    => $request->nombre_completo,
            'apellido_paterno'   => $request->apellido_paterno,
            'apellido_materno'   => $request->apellido_materno,
            'ci'                 => $request->ci,
            'telefono'           => $request->telefono,
            'genero'             => $request->genero,
            'fecha_nacimiento'   => $request->fecha_nacimiento,
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

        $cliente->update([
            'dias_asistidos' => $request->dias_asistidos,
            'huella_digital' => $request->huella_digital,
            'estado'         => $request->estado,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    // DESTROY
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado lógicamente.');
    }

    // ==============================
    // SHOW (Perfil del cliente logueado)
    // ==============================

    public function show()
    {
        // Obtener el cliente asociado al usuario logueado
        $cliente = Cliente::with(['persona', 'user', 'membresias'])
                    ->where('id_usuario', Auth::id())
                    ->first();

        if (!$cliente) {
            return redirect()->back()->with('error', 'No tienes un perfil de cliente asociado.');
        }

        // Membresía activa más reciente
        $membresia = $cliente->membresias()
                            ->wherePivot('fecha_fin', '>=', now())
                            ->orderByPivot('fecha_fin', 'desc')
                            ->first();

        // Asistencias
        $asistencias = Asistencia::where('id_cliente', $cliente->id)->get();

        // Pagos
        $pagos = Pago::where('id_cliente', $cliente->id)->get();

        // Rutinas (todas creadas por entrenadores)
        $rutinas = Rutina::with('entrenador.persona')->get();

        return view('clientes.show', compact('cliente', 'membresia', 'asistencias', 'pagos', 'rutinas'));
    }

}
