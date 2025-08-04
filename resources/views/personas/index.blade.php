@extends('layouts.private')

@section('contenido')
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">Lista de Personas</div>
                <div>
                    <a href="{{ route('personas.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-circle-plus me-2"></i> Agregar Persona
                    </a>
                </div>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>Nombre Completo</th>
                                <th>CI</th>
                                <th>Teléfono</th>
                                <th>Género</th>
                                <th>Fecha de Nacimiento</th>
                                <th class="text">Acciones</th>
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
                                    <td class="text-end">
                                        <a href="{{ route('personas.edit', $persona) }}" class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('personas.destroy', $persona) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta persona?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center">No hay personas registradas.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
