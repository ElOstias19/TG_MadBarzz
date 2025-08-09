@extends('layouts.private')

@section('contenido')
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">Lista de Entrenadores</div>
                <div>
                    <a href="{{ route('entrenadores.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-circle-plus me-2"></i> Nuevo Entrenador
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
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Especialidad</th>
                                <th>Experiencia</th>
                                <th>Disponibilidad</th>
                                <th>Estado</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($entrenadores as $entrenador)
                                <tr>
                                    <td>{{ $entrenador->id_entrenador }}</td>
                                    <td>{{ $entrenador->persona->nombre_completo ?? '' }} {{ $entrenador->persona->apellido_paterno ?? '' }} {{ $entrenador->persona->apellido_materno ?? '' }}</td>
                                    <td>{{ $entrenador->especialidad }}</td>
                                    <td>{{ $entrenador->experiencia }}</td>
                                    <td>{{ implode(', ', json_decode($entrenador->disponibilidad, true) ?? []) }}</td>
                                    <td>{{ ucfirst($entrenador->estado) }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('entrenadores.edit', $entrenador->id_entrenador) }}" class="btn btn-warning btn-sm me-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('entrenadores.destroy', $entrenador->id_entrenador) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar entrenador?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No hay entrenadores registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
