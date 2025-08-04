@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-6 offset-xl-3">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">Editar usuario</div>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $usuario->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nombre de usuario -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre de usuario</label>
                      <input type="text" name="name" value="{{ old('name', $usuario->name) }}" />

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input
                            type="email"
                            id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email', $usuario->email) }}"
                            required
                        >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            Contraseña
                            <small class="text-muted">(dejar en blanco si no desea cambiarla)</small>
                        </label>
                        <input
                            type="password"
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                        >
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Rol -->
                    <div class="mb-3">
                        <label for="rol_id" class="form-label">Rol</label>
                        <select
                            id="rol_id"
                            class="form-control @error('rol_id') is-invalid @enderror"
                            name="rol_id"
                            required
                        >
                            <option value="">Seleccione un rol</option>
                            @foreach ($roles as $rol)
                                <option
                                    value="{{ $rol->id }}"
                                    {{ old('rol_id', $usuario->rol_id) == $rol->id ? 'selected' : '' }}
                                >
                                    {{ $rol->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('rol_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save me-1"></i> Actualizar
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
