@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">

            <div class="card-header">
                <h2 class="fw-bold mb-4">Registrar Recepcionista</h2>
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

                <form action="{{ route('recepcionistas.store') }}" method="POST">
                    @csrf

                    <h4 class="dark-text-white mt-3">Datos de la Persona</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Nombre Completo</label>
                            <input type="text" name="nombre_completo" class="form-control @error('nombre_completo') is-invalid @enderror" value="{{ old('nombre_completo') }}" required>
                            @error('nombre_completo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Apellido Paterno</label>
                            <input type="text" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{ old('apellido_paterno') }}" required>
                            @error('apellido_paterno')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Apellido Materno</label>
                            <input type="text" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{ old('apellido_materno') }}" required>
                            @error('apellido_materno')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Cédula de Identidad</label>
                            <input type="text" name="ci" class="form-control @error('ci') is-invalid @enderror" value="{{ old('ci') }}" required>
                            @error('ci')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Teléfono</label>
                            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}">
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Opcional, pero debe ser único si lo registra.</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Género</label>
                            <select name="genero" class="form-control @error('genero') is-invalid @enderror" required>
                                <option value="">-- Seleccione --</option>
                                <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="femenino" {{ old('genero') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                <option value="otro" {{ old('genero') == 'otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('genero')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror" value="{{ old('fecha_nacimiento') }}" required>
                            @error('fecha_nacimiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h4 class="dark-text-white mt-4">Datos del Usuario</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Nombre de Usuario</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Contraseña</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    <h4 class="dark-text-white mt-4">Datos del Recepcionista</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Turno</label>
                            <select name="turno" class="form-control @error('turno') is-invalid @enderror" required>
                                <option value="">-- Seleccione --</option>
                                <option value="mañana" {{ old('turno') == 'mañana' ? 'selected' : '' }}>Mañana</option>
                                <option value="tarde" {{ old('turno') == 'tarde' ? 'selected' : '' }}>Tarde</option>
                                <option value="noche" {{ old('turno') == 'noche' ? 'selected' : '' }}>Noche</option>
                            </select>
                            @error('turno')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Punto de Atención</label>
                            <input type="text" name="punto_atencion" class="form-control @error('punto_atencion') is-invalid @enderror" value="{{ old('punto_atencion') }}" required>
                            @error('punto_atencion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Estado</label>
                            <select name="estado" class="form-control @error('estado') is-invalid @enderror" required>
                                <option value="">-- Seleccione --</option>
                                <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save me-2"></i> Guardar
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
