@extends('layouts.private')

@section('contenido')
<div class="container mt-4">

    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $rutina->titulo }}</h3>
            <small>Creada por: {{ $rutina->entrenador->persona->nombre_completo ?? '' }}
                            {{ $rutina->entrenador->persona->apellido_paterno ?? '' }}
                            {{ $rutina->entrenador->persona->apellido_materno ?? '' }}</small>
        </div>
        <div class="card-body">
            @if($rutina->archivo)
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $rutina->archivo) }}" 
                         alt="Imagen de la rutina" 
                         class="img-fluid rounded shadow"
                         style="max-height: 400px; width: auto;">
                </div>
            @endif

            <div class="mb-3">
                <h5>Descripción</h5>
                <p class="text-muted">{{ $rutina->descripcion ?? 'Sin descripción' }}</p>
            </div>

            <div class="mb-3">
                <h5>Estado</h5>
                <span class="badge 
                    @if($rutina->estado == 'activa') badge-success
                    @elseif($rutina->estado == 'inactiva') badge-secondary
                    @elseif($rutina->estado == 'completada') badge-primary
                    @endif">
                    {{ ucfirst($rutina->estado) }}
                </span>
            </div>

            <div class="mb-3 text-muted">
                <small>Creación: {{ $rutina->created_at->format('d/m/Y H:i') }}</small><br>
                <small>Última actualización: {{ $rutina->updated_at->format('d/m/Y H:i') }}</small>
            </div>

            <a href="{{ route('rutinas.show', Auth::user()->id) }}" class="btn btn-secondary">
                ← Volver a mis rutinas
            </a>
        </div>
    </div>
</div>
@endsection
