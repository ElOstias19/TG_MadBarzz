@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title fs-24 fw-bold text-dark dark-text-white">
                    <h2 class="text-dark dark:text-white fw-bold mb-4">Registrar Persona</h2>
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

                <form action="{{ route('personas.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nombre_completo" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Nombre Completo
                            </label>
                            <input type="text" id="nombre_completo" name="nombre_completo" 
                                   class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="apellido_paterno" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Apellido Paterno
                            </label>
                            <input type="text" id="apellido_paterno" name="apellido_paterno" 
                                   class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="apellido_materno" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Apellido Materno
                            </label>
                            <input type="text" id="apellido_materno" name="apellido_materno" 
                                   class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label for="ci" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                CI
                            </label>
                            <input type="text" id="ci" name="ci" 
                                   class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="telefono" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Teléfono
                            </label>
                            <input type="text" id="telefono" name="telefono" 
                                   class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label for="genero" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Género
                            </label>
                            <select id="genero" name="genero" class="" required>
                                <option value="">Seleccione</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_nacimiento" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Fecha de Nacimiento
                            </label>
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" 
                                   class="form-control" required>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-circle-plus me-2"></i> Guardar
                        </button>
                        <a href="{{ route('personas.index') }}" class="btn btn-secondary ms-2">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
