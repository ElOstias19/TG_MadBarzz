@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Cliente</h2>

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Persona:</label>
            <select name="id_persona" class="form-control" required>
                @foreach($personas as $persona)
                    <option value="{{ $persona->id_persona }}">{{ $persona->nombre_completo }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Días Asistidos:</label>
            <input type="number" name="dias_asistidos" class="form-control" value="0" required>
        </div>

        <div class="form-group">
            <label>Usuario:</label>
            <select name="id_usuario" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
