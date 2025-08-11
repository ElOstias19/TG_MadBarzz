@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Editar Administrador</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Errores:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('administradores.update', $administrador->id_administrador) }}" method="POST">
        @csrf
        @method('PUT')

        <h4>Datos de Persona</h4>
        <input type="text" name="nombre_completo" value="{{ old('nombre_completo', $administrador->persona->nombre_completo) }}" class="form-control mb-2">
        <input type="text" name="apellido_paterno" value="{{ old('apellido_paterno', $administrador->persona->apellido_paterno) }}" class="form-control mb-2">
        <input type="text" name="apellido_materno" value="{{ old('apellido_materno', $administrador->persona->apellido_materno) }}" class="form-control mb-2">
        <input type="text" name="ci" value="{{ old('ci', $administrador->persona->ci) }}" class="form-control mb-2">
        <input type="text" name="telefono" value="{{ old('telefono', $administrador->persona->telefono) }}" class="form-control mb-2">

        <select name="genero" class="form-control mb-2">
            <option value="masculino" {{ old('genero', $administrador->persona->genero) == 'masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="femenino" {{ old('genero', $administrador->persona->genero) == 'femenino' ? 'selected' : '' }}>Femenino</option>
            <option value="otro" {{ old('genero', $administrador->persona->genero) == 'otro' ? 'selected' : '' }}>Otro</option>
        </select>

        <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $administrador->persona->fecha_nacimiento) }}" class="form-control mb-4">

        <h4>Datos de Usuario</h4>
        <input type="text" name="name" value="{{ old('name', $administrador->user->name) }}" class="form-control mb-2">
        <input type="email" name="email" value="{{ old('email', $administrador->user->email) }}" class="form-control mb-2">

        <input type="password" name="password" placeholder="Nueva contraseña (opcional)" class="form-control mb-4">

        <h4>Datos de Administrador</h4>
        <select name="nivel_acceso" class="form-control mb-2">
            <option value="superadmin" {{ old('nivel_acceso', $administrador->nivel_acceso) == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
            <option value="gestion" {{ old('nivel_acceso', $administrador->nivel_acceso) == 'gestion' ? 'selected' : '' }}>Gestión</option>
            <option value="finanzas" {{ old('nivel_acceso', $administrador->nivel_acceso) == 'finanzas' ? 'selected' : '' }}>Finanzas</option>
        </select>

        <input type="text" name="area_responsable" value="{{ old('area_responsable', $administrador->area_responsable) }}" class="form-control mb-2">

        <select name="estado" class="form-control mb-4">
            <option value="activo" {{ old('estado', $administrador->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
            <option value="inactivo" {{ old('estado', $administrador->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
        </select>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('administradores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
