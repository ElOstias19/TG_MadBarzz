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
                    $seleccionadasEspecialidad = old('especialidad', $entrenador->especialidad ?? []);
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

        <input type="text" name="experiencia" value="{{ old('experiencia', $entrenador->experiencia) }}" class="form-control mb-2">
        <div class="mb-3">
            <label for="disponibilidad" class="form-label">Disponibilidad</label>
            <select name="disponibilidad[]" id="disponibilidad" class="form-control" multiple required>
                @php
                    $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
                    $seleccionados = old('disponibilidad', $entrenador->disponibilidad ?? []);
                @endphp
                @foreach ($dias as $dia)
                    <option value="{{ $dia }}" {{ in_array($dia, $seleccionados) ? 'selected' : '' }}>{{ $dia }}</option>
                @endforeach
            </select>
            @error('disponibilidad')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Mantén presionada la tecla CTRL (o Command en Mac) para seleccionar varios días.</small>
        </div>

        <select name="estado" class="form-control mb-4">
            <option value="activo" {{ old('estado', $entrenador->estado)=='activo'?'selected':'' }}>Activo</option>
            <option value="inactivo" {{ old('estado', $entrenador->estado)=='inactivo'?'selected':'' }}>Inactivo</option>
        </select>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('entrenadores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
