@extends('layouts.private')

@section('contenido')
<div class="container mt-5">

    <h2 class="text-center mb-4">Mi Membresía</h2>

    @if($membresia)
        <div class="card shadow-lg border-0 mx-auto" style="max-width: 500px;">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0"><i class="fa-solid fa-id-card me-2"></i>{{ $membresia->nombre }}</h4>
            </div>
            <div class="card-body text-center">
                <p class="mb-2"><strong>Fecha inicio:</strong> 
                    {{ \Carbon\Carbon::parse($membresia->pivot->fecha_inicio)->format('d/m/Y') }}
                </p>
                <p class="mb-2"><strong>Fecha fin:</strong> 
                    {{ \Carbon\Carbon::parse($membresia->pivot->fecha_fin)->format('d/m/Y') }}
                </p>
                <p class="mb-0 text-muted">Disfruta de todos los beneficios de tu plan.</p>
            </div>
            <div class="card-footer text-center bg-dark text-white">
                <span class="badge bg-success p-2">Activa</span>
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center shadow-sm">
            <i class="fa fa-info-circle fa-2x mb-2"></i>
            <h5>No tienes una membresía activa</h5>
            <p class="mb-0">Contacta con la calistenia para adquirir un plan.</p>
        </div>
    @endif

</div>

<style>
    .card {
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,0.2);
    }
    .card-header {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
    .card-footer {
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }
    @media (max-width: 576px) {
        .card {
            margin: 0 10px;
        }
    }
</style>
@endsection
