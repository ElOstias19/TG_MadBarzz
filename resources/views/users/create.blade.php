@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-6 offset-xl-3">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">Agregar nuevo usuario</div>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <!-- Nombre de Usuario -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               name="name" id="name" 
                               value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               name="email" id="email" 
                               value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               name="password" id="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" 
                               name="password_confirmation" id="password_confirmation" required>
                    </div>

                    <!-- Rol -->
                    <div class="mb-3">
                        <label for="rol_id" class="form-label">Rol</label>
                        <select class="form-select @error('rol_id') is-invalid @enderror" 
                                name="rol_id" id="rol_id" required>
                            <option value="">Seleccione un rol</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}" {{ old('rol_id') == $rol->id ? 'selected' : '' }}>
                                    {{ $rol->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('rol_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-check me-1"></i> Guardar
                    </button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left me-1"></i> Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
