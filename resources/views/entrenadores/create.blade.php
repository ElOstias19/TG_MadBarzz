@extends('layouts.private')

@section('contenido')
<div class="container">
    <h1>Registrar Entrenador</h1>

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

    <form action="{{ route('entrenadores.store') }}" method="POST">
        @csrf

        <h4>Datos de Persona</h4>
        <input type="text" name="nombre_completo" placeholder="Nombre completo" value="{{ old('nombre_completo') }}" class="form-control mb-2">
        <input type="text" name="apellido_paterno" placeholder="Apellido paterno" value="{{ old('apellido_paterno') }}" class="form-control mb-2">
        <input type="text" name="apellido_materno" placeholder="Apellido materno" value="{{ old('apellido_materno') }}" class="form-control mb-2">
        <input type="text" name="ci" placeholder="CI" value="{{ old('ci') }}" class="form-control mb-2">
        <input type="text" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}" class="form-control mb-2">

        <select name="genero" class="form-control mb-2">
            <option value="">Seleccione género</option>
            <option value="masculino" {{ old('genero')=='masculino'?'selected':'' }}>Masculino</option>
            <option value="femenino" {{ old('genero')=='femenino'?'selected':'' }}>Femenino</option>
            <option value="otro" {{ old('genero')=='otro'?'selected':'' }}>Otro</option>
        </select>

        <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="form-control mb-4">

        <h4>Datos de Usuario</h4>
        <input type="text" name="name" placeholder="Usuario" value="{{ old('name') }}" class="form-control mb-2">
        <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" class="form-control mb-2">
        <input type="password" name="password" placeholder="Contraseña" class="form-control mb-2">
        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="form-control mb-4">

        <h4>Datos de Entrenador</h4>
<div class="form-group">
    <label for="especialidad">Especialidad</label>
    <select name="especialidad[]" id="especialidad" class="form-control" multiple required>
        @php
            $opcionesEspecialidad = [
                'Calistenia básica',
                'Calistenia avanzada',
                'Entrenamiento de fuerza',
                'Resistencia',
                'Flexibilidad y movilidad',
                'Preparación física para competencias',
                'Nutrición y hábitos saludables'
            ];
            $seleccionadasEspecialidad = old('especialidad', []);
        @endphp
        @foreach ($opcionesEspecialidad as $opcion)
            <option value="{{ $opcion }}" {{ in_array($opcion, $seleccionadasEspecialidad) ? 'selected' : '' }}>
                {{ $opcion }}
            </option>
        @endforeach
    </select>
    @error('especialidad')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <small class="form-text text-muted">Mantén presionada la tecla CTRL (o Command en Mac) para seleccionar varias especialidades.</small>
</div>

        <input type="text" name="experiencia" placeholder="Experiencia" value="{{ old('experiencia') }}" class="form-control mb-2">
        <div class="mb-3">
            <label for="disponibilidad" class="form-label">Disponibilidad</label>
            <select name="disponibilidad[]" id="disponibilidad" class="form-control" multiple required>
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miércoles">Miércoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sábado">Sábado</option>
            </select>
            @error('disponibilidad')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Mantén presionada la tecla CTRL (o Command en Mac) para seleccionar varios días.</small>
        </div>

        <select name="estado" class="form-control mb-4">
            <option value="">Seleccione estado</option>
            <option value="activo" {{ old('estado')=='activo'?'selected':'' }}>Activo</option>
            <option value="inactivo" {{ old('estado')=='inactivo'?'selected':'' }}>Inactivo</option>
        </select>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('entrenadores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
