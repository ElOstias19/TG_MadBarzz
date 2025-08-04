@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">
                    Datos del rol
                </div>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label fs-14 text-dark fw-semibold">Nombre</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="nombre" 
                                   name="nombre" 
                                   placeholder="Ingrese el nombre del rol" 
                                   required>
                        </div>

                        {{-- Aquí puedes agregar más campos si los tienes --}}
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-circle-plus me-2"></i> Agregar
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
