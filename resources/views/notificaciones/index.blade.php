@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Notificaciones enviadas</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('notificaciones.create') }}" class="btn btn-primary mb-3">Enviar nueva notificación</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Tipo</th>
                <th>Mensaje</th>
                <th>Fecha de envío</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($notificaciones as $notificacion)
                <tr>
                    <td>{{ $notificacion->id }}</td>
                    <td>{{ $notificacion->cliente->persona->nombre_completo ?? 'Sin datos' }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $notificacion->tipo)) }}</td>
                    <td>{{ $notificacion->mensaje }}</td>
                    <td>{{ $notificacion->fecha_envio ?? 'No enviado' }}</td>
                    <td>{{ ucfirst($notificacion->estado ?? 'Pendiente') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay notificaciones.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
