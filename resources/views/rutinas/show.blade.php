@extends('layouts.private')

@section('contenido')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col p-md-0">
            <h4>Mis Rutinas</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($rutinas->count())
                        <div class="row">
                            @foreach($rutinas as $rutina)
                                <div class="col-lg-6 col-xl-4">
                                    <div class="card mb-4">
                                        <div class="card-header bg-primary text-white">
                                            <h5 class="card-title mb-0">{{ $rutina->titulo }}</h5>
                                            <small class="d-block">Creada por: {{ $rutina->entrenador->persona->nombre_completo }}</small>
                                        </div>
                                        <div class="card-body">
                                            @if($rutina->archivo)
                                                <div class="text-center mb-3">
                                                    <img src="{{ asset('storage/' . $rutina->archivo) }}" 
                                                         alt="Imagen de la rutina" 
                                                         class="img-fluid rounded"
                                                         style="max-height: 200px; width: auto;">
                                                </div>
                                            @endif

                                            <div class="mb-3">
                                                <strong>Descripción:</strong>
                                                <p class="text-muted">{{ $rutina->descripcion ?? 'Sin descripción' }}</p>
                                            </div>

                                            <div class="mb-3">
                                                <strong>Estado:</strong>
                                                <span class="badge 
                                                    @if($rutina->estado == 'activa') badge-success
                                                    @elseif($rutina->estado == 'inactiva') badge-secondary
                                                    @elseif($rutina->estado == 'completada') badge-primary
                                                    @endif">
                                                    {{ ucfirst($rutina->estado) }}
                                                </span>
                                            </div>

                                            <div class="text-muted">
                                                <small>Creación: {{ $rutina->created_at->format('d/m/Y H:i') }}</small>
                                                <br>
                                                <small>Última actualización: {{ $rutina->updated_at->format('d/m/Y H:i') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Resumen estadístico -->
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="card bg-primary text-white text-center">
                                    <div class="card-body py-3">
                                        <h6 class="mb-1">Total Rutinas</h6>
                                        <h4 class="mb-0">{{ $rutinas->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-success text-white text-center">
                                    <div class="card-body py-3">
                                        <h6 class="mb-1">Rutinas Activas</h6>
                                        <h4 class="mb-0">{{ $rutinas->where('estado', 'activa')->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-info text-white text-center">
                                    <div class="card-body py-3">
                                        <h6 class="mb-1">Con Imagen</h6>
                                        <h4 class="mb-0">{{ $rutinas->whereNotNull('archivo')->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-warning text-white text-center">
                                    <div class="card-body py-3">
                                        <h6 class="mb-1">Última Rutina</h6>
                                        <h6 class="mb-0">{{ $rutinas->first()->created_at->format('d/m/Y') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else
                        <div class="alert alert-info text-center">
                            <i class="fa fa-info-circle fa-2x mb-3"></i>
                            <h5>No tienes rutinas asignadas</h5>
                            <p class="mb-0">Contacta con tu entrenador para que te asigne una rutina personalizada.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        border: 1px solid #e3e6f0;
        transition: transform 0.2s ease;
    }
    .card:hover {
        transform: translateY(-2px);
    }
    .badge {
        font-size: 0.85em;
        padding: 0.4em 0.6em;
    }
    .bg-primary { background-color: #4e73df !important; }
    .bg-success { background-color: #1cc88a !important; }
    .bg-info { background-color: #36b9cc !important; }
    .bg-warning { background-color: #f6c23e !important; }
</style>
@endsection