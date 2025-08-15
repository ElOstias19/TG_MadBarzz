<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Entrenador;
class DashboardController extends Controller
{
public function index()
{
    $clientes = Cliente::where('estado', 'activo')->get();
    $entrenadores = Entrenador::where('estado', 'activo')->get();

    return view('dashboard.index', compact('clientes', 'entrenadores'));
}

    
}
