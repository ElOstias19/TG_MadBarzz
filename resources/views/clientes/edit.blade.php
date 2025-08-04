@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Editar Cliente</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST">
        @csrf
        @method('PUT')

        <h4>Datos de la Persona</h4>

        <div class="form-group">
            <label>Nombre Completo:</label>
            <input type="text" name="nombre_completo" class="form-control" value="{{ old('nombre_completo', $cliente->persona->nombre_completo ?? '') }}" required>
        </div>

        <div class="form-group">
            <label>Apellido Paterno:</label>
            <input type="text" name="apellido_paterno" class="form-control" value="{{ old('apellido_paterno', $cliente->persona->apellido_paterno ?? '') }}" required>
        </div>

        <div class="form-group">
            <label>Apellido Materno:</label>
            <input type="text" name="apellido_materno" class="form-control" value="{{ old('apellido_materno', $cliente->persona->apellido_materno ?? '') }}" required>
        </div>

        <div class="form-group">
            <label>Cédula de Identidad:</label>
            <input type="text" name="ci" class="form-control" value="{{ old('ci', $cliente->persona->ci ?? '') }}" required>
        </div>

        <div class="form-group">
            <label>Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $cliente->persona->telefono ?? '') }}" required>
        </div>

        <div class="form-group">
            <label>Género:</label>
            <select name="genero" class="form-control" required>
                <option value="masculino" {{ old('genero', $cliente->persona->genero ?? '') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="femenino" {{ old('genero', $cliente->persona->genero ?? '') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                <option value="otro" {{ old('genero', $cliente->persona->genero ?? '') == 'otro' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>

        <div class="form-group">
            <label>Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $cliente->persona->fecha_nacimiento ?? '') }}" required>
        </div>

        <hr>
        <h4>Datos del Usuario</h4>

        <div class="form-group">
            <label>Nombre de Usuario:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $cliente->user->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $cliente->user->email ?? '') }}" required>
        </div>

        <div class="form-group">
            <label>Contraseña (dejar vacío para no cambiar):</label>
            <input type="password" name="password" class="form-control">
        </div>

        <hr>
        <h4>Datos del Cliente</h4>

        <div class="form-group">
            <label>Días Asistidos:</label>
            <input type="number" name="dias_asistidos" class="form-control" value="{{ old('dias_asistidos', $cliente->dias_asistidos) }}" min="0" required>
        </div>

        <div class="form-group">
            <label>Huella Digital (opcional):</label>
            <input type="text" name="huella_digital" class="form-control" value="{{ old('huella_digital', $cliente->huella_digital) }}" placeholder="Hash o identificador">
        </div>

        <div class="form-group">
            <label>Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="activo" {{ old('estado', $cliente->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ old('estado', $cliente->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
    </form>
</div>
@endsection
