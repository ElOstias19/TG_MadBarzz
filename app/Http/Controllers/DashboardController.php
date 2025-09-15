<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Entrenador;
use App\Models\Asistencia;
use App\Models\Pago;
use App\Models\Rutina;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Dashboard general (administrador)
    public function index()
    {
        $clientes = Cliente::where('estado', 'activo')->get();
        $entrenadores = Entrenador::where('estado', 'activo')->get();

        return view('dashboard.index', compact('clientes', 'entrenadores'));
    }

    // Dashboard para cliente
public function cliente()
{
    $user = Auth::user();

    // Obtener el cliente asociado al usuario logueado
    $cliente = Cliente::with(['membresias'])->where('id_usuario', $user->id)->first();

    if (!$cliente) {
        return redirect()->back()->with('error', 'No tienes un perfil de cliente asociado.');
    }

    // Membresía activa más reciente
    $membresia = $cliente->membresias()
                        ->wherePivot('fecha_fin', '>=', now())
                        ->orderByPivot('fecha_fin', 'desc')
                        ->first();

    // Asistencias ordenadas por fecha_hora_entrada descendente
    $asistencias = Asistencia::where('id_cliente', $cliente->id)
                              ->orderBy('fecha_hora_entrada', 'desc')
                              ->get();

    // Pagos del cliente
// Obtener el cliente asociado al usuario logueado
$cliente = Cliente::where('id_usuario', Auth::id())->first();

if (!$cliente) {
    return redirect()->back()->with('error', 'No tienes un perfil de cliente asociado.');
}

// Pagos del cliente
$pagos = Pago::where('id_cliente', $cliente->id_cliente)->orderBy('fecha_pago', 'desc')->get();

    // Rutinas (todas creadas por entrenadores)
    $rutinas = Rutina::with('entrenador.persona')->get();

    return view('dashboard.cliente', compact('membresia', 'asistencias', 'pagos', 'rutinas'));
}


}
