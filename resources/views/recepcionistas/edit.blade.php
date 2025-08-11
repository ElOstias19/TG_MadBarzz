@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Editar Recepcionista</h2>

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

    <form action="{{ route('recepcionistas.update', $recepcionista->id_recepcionista) }}" method="POST">
        @csrf
        @method('PUT')

        <h4>Datos de la Persona</h4>

        <input type="text" name="nombre_completo" value="{{ old('nombre_completo', $recepcionista->persona->nombre_completo) }}" class="form-control mb-2">
        <input type="text" name="apellido_paterno" value="{{ old('apellido_paterno', $recepcionista->persona->apellido_paterno) }}" class="form-control mb-2">
        <input type="text" name="apellido_materno" value="{{ old('apellido_materno', $recepcionista->persona->apellido_materno) }}" class="form-control mb-2">
        <input type="text" name="ci" value="{{ old('ci', $recepcionista->persona->ci) }}" class="form-control mb-2">
        <input type="text" name="telefono" value="{{ old('telefono', $recepcionista->persona->telefono) }}" class="form-control mb-2">

        <select name="genero" class="form-control mb-2">
            <option value="masculino" {{ old('genero', $recepcionista->persona->genero) == 'masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="femenino" {{ old('genero', $recepcionista->persona->genero) == 'femenino' ? 'selected' : '' }}>Femenino</option>
            <option value="otro" {{ old('genero', $recepcionista->persona->genero) == 'otro' ? 'selected' : '' }}>Otro</option>
        </select>

        <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $recepcionista->persona->fecha_nacimiento) }}" class="form-control mb-4">

        <h4>Datos de Usuario</h4>
        <input type="text" name="name" value="{{ old('name', $recepcionista->user->name) }}" class="form-control mb-2">
        <input type="email" name="email" value="{{ old('email', $recepcionista->user->email) }}" class="form-control mb-2">

        <input type="password" name="password" placeholder="Nueva contraseña (opcional)" class="form-control mb-4">

        <h4>Datos del Recepcionista</h4>
        <select name="turno" class="form-control mb-2">
            <option value="mañana" {{ old('turno', $recepcionista->turno) == 'mañana' ? 'selected' : '' }}>Mañana</option>
            <option value="tarde" {{ old('turno', $recepcionista->turno) == 'tarde' ? 'selected' : '' }}>Tarde</option>
            <option value="noche" {{ old('turno', $recepcionista->turno) == 'noche' ? 'selected' : '' }}>Noche</option>
        </select>

        <input type="text" name="punto_atencion" value="{{ old('punto_atencion', $recepcionista->punto_atencion) }}" class="form-control mb-2">

        <select name="estado" class="form-control mb-4">
            <option value="activo" {{ old('estado', $recepcionista->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
            <option value="inactivo" {{ old('estado', $recepcionista->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
        </select>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('recepcionistas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
