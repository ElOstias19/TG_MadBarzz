@extends('layouts.private')

@section('contenido')
<div class="container">
    <h1>Lista de Entrenadores</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('entrenadores.create') }}" class="btn btn-success mb-3">Nuevo Entrenador</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Experiencia</th>
                <th>Disponibilidad</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entrenadores as $entrenador)
            <tr>
                <td>{{ $entrenador->persona->nombre_completo }}</td>
                <td>{{ $entrenador->especialidad }}</td>
                <td>{{ $entrenador->experiencia }}</td>
                <td>{{ $entrenador->disponibilidad }}</td>
                <td>{{ ucfirst($entrenador->estado) }}</td>
                <td>
                    <a href="{{ route('entrenadores.edit', $entrenador->id_entrenador) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('entrenadores.destroy', $entrenador->id_entrenador) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
