@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">

            <div class="card-header">
                <h2 class="fw-bold mb-4">Editar Recepcionista</h2>
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

                <form action="{{ route('recepcionistas.update', $recepcionista->id_recepcionista) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <h4 class="dark-text-white mt-3">Datos de la Persona</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Nombre Completo</label>
                            <input type="text" name="nombre_completo" class="form-control" value="{{ old('nombre_completo', $recepcionista->persona->nombre_completo) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Apellido Paterno</label>
                            <input type="text" name="apellido_paterno" class="form-control" value="{{ old('apellido_paterno', $recepcionista->persona->apellido_paterno) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Apellido Materno</label>
                            <input type="text" name="apellido_materno" class="form-control" value="{{ old('apellido_materno', $recepcionista->persona->apellido_materno) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Cédula de Identidad</label>
                            <input type="text" name="ci" class="form-control" value="{{ old('ci', $recepcionista->persona->ci) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $recepcionista->persona->telefono) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Género</label>
                            <select name="genero" class="form-control" required>
                                <option value="masculino" {{ old('genero', $recepcionista->persona->genero) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="femenino" {{ old('genero', $recepcionista->persona->genero) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                <option value="otro" {{ old('genero', $recepcionista->persona->genero) == 'otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $recepcionista->persona->fecha_nacimiento) }}" required>
                        </div>
                    </div>

                    <h4 class="dark-text-white mt-4">Datos de Usuario</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Nombre de Usuario</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $recepcionista->user->name) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $recepcionista->user->email) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Nueva Contraseña (opcional)</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>

                    <h4 class="dark-text-white mt-4">Datos del Recepcionista</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Turno</label>
                            <select name="turno" class="form-control" required>
                                <option value="mañana" {{ old('turno', $recepcionista->turno) == 'mañana' ? 'selected' : '' }}>Mañana</option>
                                <option value="tarde" {{ old('turno', $recepcionista->turno) == 'tarde' ? 'selected' : '' }}>Tarde</option>
                                <option value="noche" {{ old('turno', $recepcionista->turno) == 'noche' ? 'selected' : '' }}>Noche</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Punto de Atención</label>
                            <input type="text" name="punto_atencion" class="form-control" value="{{ old('punto_atencion', $recepcionista->punto_atencion) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Estado</label>
                            <select name="estado" class="form-control" required>
                                <option value="activo" {{ old('estado', $recepcionista->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ old('estado', $recepcionista->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save me-2"></i> Actualizar
                        </button>
                            <a href="{{ route('recepcionistas.index') }}" class="btn btn-secondary ms-2">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
