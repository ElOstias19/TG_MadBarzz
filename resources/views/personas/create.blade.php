@extends('layouts.private')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card custom-card">
            <div class="card-header">
                <h4>Registrar Persona</h4>
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

                <form action="{{ route('personas.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Nombre Completo</label>
                        <input type="text" name="nombre_completo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Apellido Paterno</label>
                        <input type="text" name="apellido_paterno" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Apellido Materno</label>
                        <input type="text" name="apellido_materno" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>CI</label>
                        <input type="text" name="ci" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Teléfono</label>
                        <input type="text" name="telefono" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Género</label>
                        <select name="genero" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('personas.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
