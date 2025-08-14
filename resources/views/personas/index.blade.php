@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Listado de Personas</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('personas.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-circle-plus me-2"></i> Agregar Persona
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>CI</th>
                <th>Teléfono</th>
                <th>Género</th>
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($personas as $persona)
                <tr>
                    <td>{{ $persona->nombre_completo }} {{ $persona->apellido_paterno }} {{ $persona->apellido_materno }}</td>
                    <td>{{ $persona->ci }}</td>
                    <td>{{ $persona->telefono }}</td>
                    <td>{{ ucfirst($persona->genero) }}</td>
                    <td>{{ $persona->fecha_nacimiento }}</td>
                    <td class="d-flex justify-content-center align-items-center gap-1">
                        <a href="{{ route('personas.edit', $persona) }}" 
                           class="btn btn-warning btn-sm" 
                           title="Editar">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('personas.destroy', $persona) }}" 
                              method="POST" 
                              style="display:inline;" 
                              onsubmit="return confirm('¿Estás seguro de eliminar esta persona?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" title="Eliminar">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay personas registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
