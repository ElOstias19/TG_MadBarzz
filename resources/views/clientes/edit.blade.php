@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Cliente</h2>

    <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Persona:</label>
            <select name="id_persona" class="form-control" required>
                @foreach($personas as $persona)
                    <option value="{{ $persona->id_persona }}" {{ $cliente->id_persona == $persona->id_persona ? 'selected' : '' }}>
                        {{ $persona->nombre_completo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Días Asistidos:</label>
            <input type="number" name="dias_asistidos" class="form-control" value="{{ $cliente->dias_asistidos }}" required>
        </div>

        <div class="form-group">
            <label>Usuario:</label>
            <select name="id_usuario" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $cliente->id_usuario == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
