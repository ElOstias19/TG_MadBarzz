@extends('layouts.private')

@section('contenido')
<div class="container">



    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <h2 class="mb-4">Mis Rutinas</h2>

    @if($rutinas->count())
        <div class="row">
            @foreach($rutinas as $rutina)
                <div class="col-lg-6 col-xl-4">
                    <div class="card shadow mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">{{ $rutina->titulo }}</h5>
                            <small>Entrenador: {{ $rutina->entrenador->persona->nombre_completo ?? '' }}
                            {{ $rutina->entrenador->persona->apellido_paterno ?? '' }}
                            {{ $rutina->entrenador->persona->apellido_materno ?? '' }}</small>
                        </div>
                        <div class="card-body text-center">
                            @if($rutina->archivo)
                                <img src="{{ asset('storage/' . $rutina->archivo) }}" 
                                     class="img-fluid rounded mb-3"
                                     style="max-height: 180px;">
                            @endif
                            <p class="text-muted">{{ \Illuminate\Support\Str::limit($rutina->descripcion, 80) }}</p>
                            <a href="{{ route('rutinas.ver', $rutina->id_rutina) }}" 
                               class="btn btn-info btn-sm">
                                <i class="fa fa-eye me-1"></i> Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center">
            <i class="fa fa-info-circle fa-2x mb-2"></i>
            <h5>No tienes rutinas asignadas</h5>
        </div>
    @endif
</div>
@endsection
