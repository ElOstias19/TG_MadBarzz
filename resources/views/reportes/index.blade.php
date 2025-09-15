@extends('layouts.private')

@section('contenido')
<div class="container">
   
   
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
   
    <h2>📊 Módulo de Reportes</h2>
    <p>Selecciona el reporte que deseas exportar a PDF:</p>

    <div class="d-flex flex-column gap-3 mt-4">
        <a href="{{ route('reportes.clientes.estado.pdf') }}" class="btn btn-primary">
            📄 Exportar Clientes Activos e Inactivos
        </a>

        <a href="{{ route('reportes.clientes.nuevos.pdf') }}" class="btn btn-success">
            📄 Exportar Clientes Nuevos por Mes
        </a>

        <a href="{{ route('reportes.clientes.vencida.pdf') }}" class="btn btn-warning">
            📄 Exportar Clientes con Membresías Vencidas o por Vencer
        </a>

        <a href="{{ route('reportes.pagos.mes.pdf') }}" class="btn btn-danger">
            📄 Exportar Pagos por Mes
        </a>
    </div>
</div>
@endsection
