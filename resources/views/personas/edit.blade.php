@extends('layouts.private')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card custom-card">
            <div class="card-header">
                <h4>Editar Persona</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('personas.update', $persona) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nombre_completo" class="form-label">Nombre Completo</label>
                        <input type="text" id="nombre_completo" name="nombre_completo" class="form-control" value="{{ old('nombre_completo', $persona->nombre_completo) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
                        <input type="text" id="apellido_paterno" name="apellido_paterno" class="form-control" value="{{ old('apellido_paterno', $persona->apellido_paterno) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido_materno" class="form-label">Apellido Materno</label>
                        <input type="text" id="apellido_materno" name="apellido_materno" class="form-control" value="{{ old('apellido_materno', $persona->apellido_materno) }}">
                    </div>

                    <div class="mb-3">
                        <label for="ci" class="form-label">CI</label>
                        <input type="text" id="ci" name="ci" class="form-control" value="{{ old('ci', $persona->ci) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', $persona->telefono) }}">
                    </div>

                    <div class="mb-3">
                        <label for="genero" class="form-label">Género</label>
                        <select id="genero" name="genero" class="" required>
                            <option value="masculino" {{ old('genero', $persona->genero) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="femenino" {{ old('genero', $persona->genero) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $persona->fecha_nacimiento) }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-save me-1"></i> Actualizar
                    </button>
                    <a href="{{ route('personas.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
