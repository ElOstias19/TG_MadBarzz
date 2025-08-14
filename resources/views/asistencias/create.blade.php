@extends('layouts.private')

@section('contenido')

<div class="container-fluid">
    <div class="row justify-content-center mt-1">
        <div class="col-xl-12">
            <div class="card custom-card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title fs-24 fw-bold text-dark dark-text-white">
                        <h2 class="fw-bold mb-0">Registrar Asistencia por Huella</h2>
                    </div>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger mb-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('asistencias.store') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="huella_digital" class="form-label fw-bold text-dark dark-text-white">Huella Digital</label>
                                <input type="text" name="huella_digital" id="huella_digital" class="form-control" placeholder="Ingresa la huella digital" required>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-fingerprint me-2"></i> Registrar Asistencia
                            </button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary ms-2">
                                Cancelar
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
