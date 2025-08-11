@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Registrar Administrador</h2>

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

    <form action="{{ route('administradores.store') }}" method="POST" class="form-texto-negro">
        @csrf

        <h4>Datos de Persona</h4>
        <input type="text" name="nombre_completo" placeholder="Nombre completo" value="{{ old('nombre_completo') }}" class="form-control mb-2">
        <input type="text" name="apellido_paterno" placeholder="Apellido paterno" value="{{ old('apellido_paterno') }}" class="form-control mb-2">
        <input type="text" name="apellido_materno" placeholder="Apellido materno" value="{{ old('apellido_materno') }}" class="form-control mb-2">
        <input type="text" name="ci" placeholder="Cédula de identidad" value="{{ old('ci') }}" class="form-control mb-2">
        <input type="text" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}" class="form-control mb-2">

        <select name="genero" class="form-control mb-2">
            <option value="">Seleccione género</option>
            <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="femenino" {{ old('genero') == 'femenino' ? 'selected' : '' }}>Femenino</option>
            <option value="otro" {{ old('genero') == 'otro' ? 'selected' : '' }}>Otro</option>
        </select>

        <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="form-control mb-4">

        <h4>Datos de Usuario</h4>
        <input type="text" name="name" placeholder="Nombre de usuario" value="{{ old('name') }}" class="form-control mb-2">
        <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" class="form-control mb-2">
        <input type="password" name="password" placeholder="Contraseña" class="form-control mb-2">
        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="form-control mb-4">

        <h4>Datos de Administrador</h4>
        <select name="nivel_acceso" class="form-control mb-2">
            <option value="">Seleccione nivel de acceso</option>
            <option value="superadmin" {{ old('nivel_acceso') == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
            <option value="gestion" {{ old('nivel_acceso') == 'gestion' ? 'selected' : '' }}>Gestión</option>
            <option value="finanzas" {{ old('nivel_acceso') == 'finanzas' ? 'selected' : '' }}>Finanzas</option>
        </select>

        <input type="text" name="area_responsable" placeholder="Área responsable" value="{{ old('area_responsable') }}" class="form-control mb-2">

        <select name="estado" class="form-control mb-4">
            <option value="">Seleccione estado</option>
            <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
            <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
        </select>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('administradores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
