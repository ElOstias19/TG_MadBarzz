@extends('layouts.private')

@section('contenido')
<div class="container-fluid py-4">

    {{-- Mensajes de éxito o error --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger shadow-sm">{{ session('error') }}</div>
    @endif

    <!-- Bienvenida -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-gradient-primary text-white shadow-lg border-0 rounded-4">
                <div class="card-body text-center">
                    <h2 class="fw-bold">¡Hola, {{ auth()->user()->name }}!</h2>
                    <p class="mb-0">Aquí tienes un resumen visual de tu membresía, pagos y rutinas.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumen general con iconos -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 text-center p-4 h-100 hover-scale">
                <div class="mb-2"><i class="fa-solid fa-id-card fa-2x text-primary"></i></div>
                <h6 class="text-muted">Membresía</h6>
                <h3 class="fw-bold text-primary">{{ $membresia ? $membresia->nombre : '0' }}</h3>
                <small class="text-muted">Activa</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 text-center p-4 h-100 hover-scale">
                <div class="mb-2"><i class="fa-solid fa-money-bill-wave fa-2x text-warning"></i></div>
                <h6 class="text-muted">Pagos</h6>
                <h3 class="fw-bold text-warning">{{ $pagos->count() }}</h3>
                <small class="text-muted">Realizados</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 text-center p-4 h-100 hover-scale">
                <div class="mb-2"><i class="fa-solid fa-dumbbell fa-2x text-info"></i></div>
                <h6 class="text-muted">Rutinas</h6>
                <h3 class="fw-bold text-info">{{ $rutinas->count() }}</h3>
                <small class="text-muted">Disponibles</small>
            </div>
        </div>
    </div>

    <!-- Secciones detalladas -->
    <div class="row g-4">

        <!-- Membresía activa -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4 h-100">
                <div class="card-header bg-primary text-white fw-bold rounded-top-4 d-flex align-items-center justify-content-between">
                    <span>Mi Membresía</span>
                    <i class="fa-solid fa-id-card"></i>
                </div>
                <div class="card-body">
                    @if($membresia)
                        <div class="card shadow-sm border-0 mb-3 hover-scale">
                            <div class="card-body text-center">
                                <h5 class="fw-bold">{{ $membresia->nombre }}</h5>
                                <small class="text-muted">
                                    Inicio: {{ \Carbon\Carbon::parse($membresia->pivot->fecha_inicio)->format('d/m/Y') }} |
                                    Fin: {{ \Carbon\Carbon::parse($membresia->pivot->fecha_fin)->format('d/m/Y') }}
                                </small>
                                <div class="mt-2">
                                    <span class="badge bg-success p-2">Activa</span>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-muted text-center">No tienes membresías activas.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Pagos recientes -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4 h-100">
                <div class="card-header bg-warning text-dark fw-bold rounded-top-4 d-flex align-items-center justify-content-between">
                    <span>Mis Pagos</span>
                    <i class="fa-solid fa-money-bill-wave"></i>
                </div>
                <div class="card-body">
                    @if($pagos->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach($pagos->take(5) as $pago)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</span>
                                    <strong class="text-warning">{{ $pago->monto }} Bs.</strong>
                                </li>
                            @endforeach
                        </ul>
                        <small class="text-muted d-block mt-2">Mostrando últimos 5 pagos.</small>
                    @else
                        <p class="text-muted text-center">Aún no realizaste pagos.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Rutinas disponibles -->
        <div class="col-12">
            <div class="card shadow-lg border-0 rounded-4 h-100">
                <div class="card-header bg-info text-white fw-bold rounded-top-4 d-flex align-items-center justify-content-between">
                    <span>Rutinas Disponibles</span>
                    <i class="fa-solid fa-dumbbell"></i>
                </div>
                <div class="card-body">
                    @if($rutinas->count() > 0)
                        <div class="row g-3">
                            @foreach($rutinas as $rutina)
                                <div class="col-md-4">
                                    <div class="card shadow-sm border-0 hover-scale h-100">
                                        <div class="card-header bg-primary text-white text-center">
                                            <h5 class="mb-0">{{ $rutina->titulo }}</h5>
                                            <small>Entrenador: {{ $rutina->entrenador->persona->nombre_completo ?? '' }}</small>
                                        </div>
                                        <div class="card-body text-center">
                                            @if($rutina->archivo)
                                                <img src="{{ asset('storage/' . $rutina->archivo) }}" class="img-fluid rounded mb-2" style="max-height: 150px;">
                                            @endif
                                            <p class="text-muted">{{ \Illuminate\Support\Str::limit($rutina->descripcion, 80) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted text-center">No hay rutinas disponibles.</p>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>

<style>
    /* Animación al hacer hover en cards */
    .hover-scale {
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .hover-scale:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,0.25);
    }
    /* Bordes redondeados y sombras más suaves */
    .card {
        border-radius: 15px;
    }
</style>
@endsection
