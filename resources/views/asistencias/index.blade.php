@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Listado de Asistencias</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('asistencias.create') }}" class="btn btn-primary mb-3">Registrar nueva asistencia</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID Asistencia</th>
                <th>Cliente</th>
                <th>Cédula</th>
                <th>Fecha y Hora de Entrada</th>
            </tr>
        </thead>
        <tbody>
            @forelse($asistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia->id_asistencia }}</td>
                    <td>{{ $asistencia->cliente->persona->nombre_completo ?? 'Sin datos' }}</td>
                    <td>{{ $asistencia->cliente->persona->ci ?? 'Sin datos' }}</td>
                    <td>{{ $asistencia->fecha_hora_entrada }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay asistencias registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
