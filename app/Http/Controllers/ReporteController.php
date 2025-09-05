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
        // Trae todos los clientes con datos de persona
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
    public function clientesNuevos()
    {
        // Tomamos los clientes del mes actual
        $clientes = Cliente::with('persona')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();

        return view('reportes.clientes_nuevos', compact('clientes'));
    }

    public function exportClientesNuevosPDF()
    {
        $clientes = Cliente::with('persona')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();

        $pdf = Pdf::loadView('reportes.pdf.clientes_nuevos', compact('clientes'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download('clientes_nuevos.pdf');
    }

    // =============================
    // 3. Clientes con membresías vencidas o por vencer
    // =============================
    public function clientesMembresiaVencida()
    {
        // Trae clientes sin membresía activa o con membresía que vence en 7 días
        $clientes = Cliente::with(['persona', 'membresiaActual'])
            ->whereDoesntHave('membresiaActual')
            ->orWhereHas('membresiaActual', function($q) {
                $q->where('fecha_fin', '<', Carbon::now()->addDays(7));
            })
            ->get();

        return view('reportes.clientes_membresia_vencida', compact('clientes'));
    }

    public function exportClientesMembresiaVencidaPDF()
    {
        $clientes = Cliente::with(['persona', 'membresiaActual'])
            ->whereDoesntHave('membresiaActual')
            ->orWhereHas('membresiaActual', function($q) {
                $q->where('fecha_fin', '<', Carbon::now()->addDays(7));
            })
            ->get();

        $pdf = Pdf::loadView('reportes.pdf.clientes_membresia_vencida', compact('clientes'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download('clientes_membresia_vencida.pdf');
    }

    // =============================
    // 4. Pagos por mes
    // =============================
    public function pagosPorMes()
    {
        // Traemos todos los pagos del mes actual con datos del cliente
        $pagos = Pago::with(['cliente.persona'])
            ->whereMonth('fecha_pago', Carbon::now()->month)
            ->get();

        return view('reportes.pagos_por_mes', compact('pagos'));
    }

    public function exportPagosPorMesPDF()
    {
        $pagos = Pago::with(['cliente.persona'])
            ->whereMonth('fecha_pago', Carbon::now()->month)
            ->get();

        $pdf = Pdf::loadView('reportes.pdf.pagos_por_mes', compact('pagos'))
                  ->setPaper('a4', 'landscape');

        return $pdf->download('pagos_por_mes.pdf');
    }
}
