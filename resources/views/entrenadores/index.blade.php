@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2 class="mb-4">Lista de Entrenadores</h2>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('entrenadores.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-circle-plus me-2"></i> Nuevo Entrenador
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Especialidad</th>
                    <th>Experiencia</th>
                    <th>Disponibilidad</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($entrenadores as $entrenador)
                    <tr>
                        <td>{{ $entrenador->id_entrenador }}</td>
                        <td>
                            {{ $entrenador->persona->nombre_completo ?? '' }}
                            {{ $entrenador->persona->apellido_paterno ?? '' }}
                            {{ $entrenador->persona->apellido_materno ?? '' }}
                        </td>
                        <td>{{ $entrenador->especialidad }}</td>
                        <td>{{ $entrenador->experiencia }}</td>
                        <td>
                            @php
                                $disponibilidad = json_decode($entrenador->disponibilidad, true) ?? [];
                            @endphp
                            {{ !empty($disponibilidad) ? implode(', ', $disponibilidad) : 'Sin disponibilidad' }}
                        </td>
                        <td>
                            <span class="badge {{ $entrenador->estado === 'activo' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($entrenador->estado) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-1">
                                <a href="{{ route('entrenadores.edit', $entrenador->id_entrenador) }}" 
                                   class="btn btn-warning btn-sm" 
                                   title="Editar">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('entrenadores.destroy', $entrenador->id_entrenador) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('¿Eliminar entrenador?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
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
@endsection
