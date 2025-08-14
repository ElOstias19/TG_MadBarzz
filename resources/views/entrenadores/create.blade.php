@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title fs-24 fw-bold text-dark dark-text-white">
                    <h2 class="fw-bold mb-4">Registrar Entrenador</h2>
                </div>
                <div>
                    <a href="{{ route('entrenadores.index') }}" class="btn btn-secondary btn-sm">
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

                <form action="{{ route('entrenadores.store') }}" method="POST">
                    @csrf

                    <h4 class="dark-text-white mt-3">Datos de Persona</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Nombre Completo</label>
                            <input type="text" name="nombre_completo" class="form-control" value="{{ old('nombre_completo') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Apellido Paterno</label>
                            <input type="text" name="apellido_paterno" class="form-control" value="{{ old('apellido_paterno') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Apellido Materno</label>
                            <input type="text" name="apellido_materno" class="form-control" value="{{ old('apellido_materno') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Cédula de Identidad</label>
                            <input type="text" name="ci" class="form-control" value="{{ old('ci') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Género</label>
                            <select name="genero" class="form-control" required>
                                <option value="">Seleccione</option>
                                <option value="masculino" {{ old('genero')=='masculino'?'selected':'' }}>Masculino</option>
                                <option value="femenino" {{ old('genero')=='femenino'?'selected':'' }}>Femenino</option>
                                <option value="otro" {{ old('genero')=='otro'?'selected':'' }}>Otro</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required>
                        </div>
                    </div>

                    <h4 class="dark-text-white mt-4">Datos de Usuario</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Nombre de Usuario</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    <h4 class="dark-text-white mt-4">Datos del Entrenador</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Especialidad</label>
                            <select name="especialidad[]" id="especialidad" class="form-control" multiple required>
                                @php
                                    $opcionesEspecialidad = [
                                        'Calistenia básica',
                                        'Calistenia avanzada',
                                        'Entrenamiento de fuerza',
                                        'Resistencia',
                                        'Flexibilidad y movilidad',
                                        'Preparación física para competencias',
                                        'Nutrición y hábitos saludables'
                                    ];
                                    $seleccionadasEspecialidad = old('especialidad', []);
                                @endphp
                                @foreach ($opcionesEspecialidad as $opcion)
                                    <option value="{{ $opcion }}" {{ in_array($opcion, $seleccionadasEspecialidad) ? 'selected' : '' }}>
                                        {{ $opcion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Experiencia</label>
                            <input type="text" name="experiencia" class="form-control" value="{{ old('experiencia') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Disponibilidad</label>
                            <select name="disponibilidad[]" id="disponibilidad" class="form-control" multiple required>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miércoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sábado">Sábado</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Estado</label>
                            <select name="estado" class="form-control" required>
                                <option value="">Seleccione estado</option>
                                <option value="activo" {{ old('estado')=='activo'?'selected':'' }}>Activo</option>
                                <option value="inactivo" {{ old('estado')=='inactivo'?'selected':'' }}>Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save me-2"></i> Guardar
                        </button>
                        <a href="{{ route('entrenadores.index') }}" class="btn btn-secondary ms-2">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
