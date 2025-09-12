@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2 class="text-center">Mi Membresía</h2>

    @if($membresia)
        <div class="card p-3">
            <p><strong>Plan:</strong> {{ $membresia->nombre }}</p>
            <p><strong>Fecha inicio:</strong> {{ $membresia->pivot->fecha_inicio }}</p>
            <p><strong>Fecha fin:</strong> {{ $membresia->pivot->fecha_fin }}</p>
        </div>
    @else
        <div class="alert alert-info text-center">
            Actualmente no tienes una membresía activa.
        </div>
    @endif
</div>
@endsection
