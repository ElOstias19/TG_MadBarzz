@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title fs-24 fw-bold text-dark dark-text-white">
                    <h2 class="text-dark dark:text-white fw-bold mb-4">Editar Usuario</h2>
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

                <form action="{{ route('users.update', $usuario->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <!-- Nombre de Usuario -->
                        <div class="col-md-6">
                            <label for="name" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Nombre de Usuario
                            </label>
                            <input type="text" name="name" id="name" 
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $usuario->name) }}" 
                                   placeholder="Ingrese el nombre de usuario"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="col-md-6">
                            <label for="email" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Correo Electrónico
                            </label>
                            <input type="email" id="email" 
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" 
                                   value="{{ old('email', $usuario->email) }}" 
                                   placeholder="Ingrese el correo electrónico"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contraseña (siempre vacío) -->
                        <div class="col-md-6">
                            <label for="password" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Contraseña <small class="text-muted">(dejar en blanco si no desea cambiarla)</small>
                            </label>
                            <input type="password" id="password" 
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password"
                                   placeholder="Ingrese la nueva contraseña" 
                                   value="">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Confirmar Contraseña
                            </label>
                            <input type="password" id="password_confirmation" 
                                   class="form-control"
                                   name="password_confirmation"
                                   placeholder="Confirme la contraseña">
                        </div>

                        <!-- Rol -->
                        <div class="col-md-6">
                            <label for="rol_id" class="form-label fs-16 fw-bold text-dark dark-text-white">
                                Rol
                            </label>

                            @if(Auth::user()->rol->nombre == 'Administrador')
                                <!-- El admin puede cambiar el rol -->
                                <select id="rol_id" 
                                        class="form-control @error('rol_id') is-invalid @enderror"
                                        name="rol_id" required>
                                    <option value="">Seleccione un rol</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}" {{ old('rol_id', $usuario->rol_id) == $rol->id ? 'selected' : '' }}>
                                            {{ $rol->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <!-- Los demás solo ven el rol -->
                                <input type="text" class="form-control" value="{{ $usuario->rol->nombre ?? 'Sin rol' }}" disabled>
                                <input type="hidden" name="rol_id" value="{{ $usuario->rol_id }}">
                            @endif

                            @error('rol_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save me-2"></i> Actualizar
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary ms-2">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
