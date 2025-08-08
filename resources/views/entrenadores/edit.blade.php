@extends('layouts.private')

@section('contenido')
<div class="container">
    <h1>Editar Entrenador</h1>

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

    <form action="{{ route('entrenadores.update', $entrenador->id_entrenador) }}" method="POST">
        @csrf
        @method('PUT')

        <h4>Datos de Persona</h4>
        <input type="text" name="nombre_completo" value="{{ old('nombre_completo', $entrenador->persona->nombre_completo) }}" class="form-control mb-2">
        <input type="text" name="apellido_paterno" value="{{ old('apellido_paterno', $entrenador->persona->apellido_paterno) }}" class="form-control mb-2">
        <input type="text" name="apellido_materno" value="{{ old('apellido_materno', $entrenador->persona->apellido_materno) }}" class="form-control mb-2">
        <input type="text" name="ci" value="{{ old('ci', $entrenador->persona->ci) }}" class="form-control mb-2">
        <input type="text" name="telefono" value="{{ old('telefono', $entrenador->persona->telefono) }}" class="form-control mb-2">

        <select name="genero" class="form-control mb-2">
            <option value="masculino" {{ old('genero', $entrenador->persona->genero)=='masculino'?'selected':'' }}>Masculino</option>
            <option value="femenino" {{ old('genero', $entrenador->persona->genero)=='femenino'?'selected':'' }}>Femenino</option>
            <option value="otro" {{ old('genero', $entrenador->persona->genero)=='otro'?'selected':'' }}>Otro</option>
        </select>

        <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $entrenador->persona->fecha_nacimiento) }}" class="form-control mb-4">

        <h4>Datos de Usuario</h4>
        <input type="text" name="name" value="{{ old('name', $entrenador->user->name) }}" class="form-control mb-2">
        <input type="email" name="email" value="{{ old('email', $entrenador->user->email) }}" class="form-control mb-2">
        <input type="password" name="password" placeholder="Nueva contraseña (opcional)" class="form-control mb-4">

        <h4>Datos de Entrenador</h4>
        <input type="text" name="especialidad" value="{{ old('especialidad', $entrenador->especialidad) }}" class="form-control mb-2">
        <input type="text" name="experiencia" value="{{ old('experiencia', $entrenador->experiencia) }}" class="form-control mb-2">
        <input type="text" name="disponibilidad" value="{{ old('disponibilidad', $entrenador->disponibilidad) }}" class="form-control mb-2">

        <select name="estado" class="form-control mb-4">
            <option value="activo" {{ old('estado', $entrenador->estado)=='activo'?'selected':'' }}>Activo</option>
            <option value="inactivo" {{ old('estado', $entrenador->estado)=='inactivo'?'selected':'' }}>Inactivo</option>
        </select>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('entrenadores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
