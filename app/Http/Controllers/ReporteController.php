<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pago;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ReporteController extends Controller
{
    // =============================
    // 1. Clientes activos e inactivos
    // =============================
    public function clientesEstado()
    {
        $clientes = Cliente::with('persona')->get();
        return view('reportes.clientes_estado', compact('clientes'));
    }

    public function exportClientesEstadoPDF()
    {
        $clientes = Cliente::with('persona')->get();

        $pdf = Pdf::loadView('reportes.pdf.clientes_estado', compact('clientes'))
                  ->setPaper('a4', 'landscape');

        return $pdf->download('clientes_estado.pdf');
    }

    // =============================
    // 2. Clientes nuevos por mes
    // =============================
    public function clientesNuevos(Request $request)
    {
        Carbon::setLocale('es');

        $mes = $request->input('mes', Carbon::now()->month);
        $anio = $request->input('anio', Carbon::now()->year);

        $clientes = Cliente::with('persona')
            ->whereYear('created_at', $anio)
            ->whereMonth('created_at', $mes)
            ->get();

        // Pasar datos para el select de meses y años
        $meses = collect(range(1,12))->mapWithKeys(function($m){
            return [$m => Carbon::create()->month($m)->locale('es')->monthName];
        });

        $anios = Cliente::selectRaw('YEAR(created_at) as anio')
                        ->distinct()
                        ->orderBy('anio','desc')
                        ->pluck('anio');

        return view('reportes.clientes_nuevos', compact('clientes', 'meses', 'anios', 'mes', 'anio'));
    }

    public function exportClientesNuevosPDF(Request $request)
    {
        Carbon::setLocale('es');

        $mes = $request->input('mes', Carbon::now()->month);
        $anio = $request->input('anio', Carbon::now()->year);

        $clientes = Cliente::with('persona')
            ->whereYear('created_at', $anio)
            ->whereMonth('created_at', $mes)
            ->get();

        $pdf = Pdf::loadView('reportes.pdf.clientes_nuevos', compact('clientes', 'mes', 'anio'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download("clientes_nuevos_{$mes}_{$anio}.pdf");
    }

// =============================
// 3. Clientes con membresías vencidas o por vencer
// =============================
public function clientesMembresiaVencida(Request $request)
{
    $mes = $request->mes;
    $anio = $request->anio;

    // Traer solo clientes que tienen al menos una membresía
    $clientes = Cliente::whereHas('membresias')
        ->with(['persona', 'membresias'])
        ->get()
        ->filter(function ($cliente) use ($mes, $anio) {
            $ultimaMembresia = $cliente->membresias()->orderBy('fecha_fin', 'desc')->first();
            if (!$ultimaMembresia) return false;

            $fechaFin = \Carbon\Carbon::parse($ultimaMembresia->pivot->fecha_fin);

            // Revisar si la membresía vence en los próximos 7 días
            $venceProximo = $fechaFin->lessThanOrEqualTo(\Carbon\Carbon::now()->addDays(7));

            // Filtrar por mes y año si se proporciona
            $mesValido = $mes ? $fechaFin->month == $mes : true;
            $anioValido = $anio ? $fechaFin->year == $anio : true;

            return $venceProximo && $mesValido && $anioValido;
        });

    return view('reportes.clientes_membresia_vencida', compact('clientes'));
}

public function exportClientesMembresiaVencidaPDF(Request $request)
{
    $mes = $request->mes;
    $anio = $request->anio;

    $clientes = Cliente::whereHas('membresias')
        ->with(['persona', 'membresias'])
        ->get()
        ->filter(function ($cliente) use ($mes, $anio) {
            $ultimaMembresia = $cliente->membresias()->orderBy('fecha_fin', 'desc')->first();
            if (!$ultimaMembresia) return false;

            $fechaFin = \Carbon\Carbon::parse($ultimaMembresia->pivot->fecha_fin);

            // Verifica si vence próximamente (7 días) y coincide con mes y año del filtro
            $venceProximo = $fechaFin->lessThanOrEqualTo(\Carbon\Carbon::now()->addDays(7));
            $mesValido = $mes ? $fechaFin->month == $mes : true;
            $anioValido = $anio ? $fechaFin->year == $anio : true;

            return $venceProximo && $mesValido && $anioValido;
        });

    // Pasar también mes y año al Blade
    $pdf = Pdf::loadView('reportes.pdf.clientes_membresia_vencida', compact('clientes', 'mes', 'anio'))
              ->setPaper('a4', 'portrait');

    return $pdf->download('clientes_membresia_vencida.pdf');
}


    // =============================
    // 4. Pagos por mes
    // =============================
    public function pagosPorMes()
    {
        $pagos = Pago::with(['cliente.persona'])
            ->whereYear('fecha_pago', Carbon::now()->year)
            ->whereMonth('fecha_pago', Carbon::now()->month)
            ->get();

        return view('reportes.pagos_por_mes', compact('pagos'));
    }

    public function exportPagosPorMesPDF()
    {
        $pagos = Pago::with(['cliente.persona'])
            ->whereYear('fecha_pago', Carbon::now()->year)
            ->whereMonth('fecha_pago', Carbon::now()->month)
            ->get();

        $pdf = Pdf::loadView('reportes.pdf.pagos_por_mes', compact('pagos'))
                  ->setPaper('a4', 'landscape');

        return $pdf->download('pagos_por_mes.pdf');
    }
}
