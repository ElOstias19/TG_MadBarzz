@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title fs-24 fw-bold text-dark dark:text-white">
                    <h2 class="text-dark dark:text-white fw-bold mb-4">Editar Rol</h2>
                </div>

            </div>

            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('roles.update', $rol->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label fs-16 fw-bold text-dark dark:text-white">
                                Nombre del Rol
                            </label>
                            <input type="text" 
                                   class="form-control"
                                   id="nombre" 
                                   name="nombre" 
                                   placeholder="Ingrese el nombre del rol" 
                                   value="{{ old('nombre', $rol->nombre) }}"
                                   required>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-circle-check me-2"></i> Guardar cambios
                        </button>
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary ms-2">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
