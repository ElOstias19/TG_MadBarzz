@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title fs-24 fw-bold text-dark dark-text-white">
                    <h2 class="text-dark dark:text-white fw-bold mb-4">Editar Persona</h2>
                </div>
                <div>
                    <a href="{{ route('personas.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fa-solid fa-arrow-left me-1"></i> Volver
                    </a>
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

                <form action="{{ route('personas.update', $persona) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nombre_completo" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Nombre Completo
                            </label>
                            <input type="text" id="nombre_completo" name="nombre_completo" 
                                   class="form-control"
                                   value="{{ old('nombre_completo', $persona->nombre_completo) }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="apellido_paterno" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Apellido Paterno
                            </label>
                            <input type="text" id="apellido_paterno" name="apellido_paterno" 
                                   class="form-control"
                                   value="{{ old('apellido_paterno', $persona->apellido_paterno) }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="apellido_materno" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Apellido Materno
                            </label>
                            <input type="text" id="apellido_materno" name="apellido_materno" 
                                   class="form-control"
                                   value="{{ old('apellido_materno', $persona->apellido_materno) }}">
                        </div>

                        <div class="col-md-6">
                            <label for="ci" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                CI
                            </label>
                            <input type="text" id="ci" name="ci" 
                                   class="form-control"
                                   value="{{ old('ci', $persona->ci) }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="telefono" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Teléfono
                            </label>
                            <input type="tel" id="telefono" name="telefono" 
                                   class="form-control"
                                   value="{{ old('telefono', $persona->telefono) }}">
                        </div>

                        <div class="col-md-6">
                            <label for="genero" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Género
                            </label>
                            <select id="genero" name="genero" class="" required>
                                <option value="masculino" {{ old('genero', $persona->genero) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="femenino" {{ old('genero', $persona->genero) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_nacimiento" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Fecha de Nacimiento
                            </label>
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" 
                                   class="form-control"
                                   value="{{ old('fecha_nacimiento', $persona->fecha_nacimiento) }}"
                                   required>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save me-2"></i> Actualizar
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
