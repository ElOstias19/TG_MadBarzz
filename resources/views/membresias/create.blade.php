@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2 class="mb-4">Listado de Membresías</h2>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Botón para crear nueva membresía --}}
    <a href="{{ route('membresias.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-circle-plus me-2"></i> Nueva Membresía
    </a>

    {{-- Tabla de membresías --}}
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Precio (Bs)</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($membresias as $membresia)
                <tr>
                    <td>{{ $membresia->id_membresia }}</td>
                    <td>{{ $membresia->tipo_membresia }}</td>
                    <td>{{ number_format($membresia->precio, 2) }}</td>
                    <td class="text-center">
                        <a href="{{ route('membresias.edit', $membresia->id_membresia) }}" 
                           class="btn btn-warning btn-sm" 
                           title="Editar">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('membresias.destroy', $membresia->id_membresia) }}" 
                              method="POST" 
                              class="d-inline"
                              onsubmit="return confirm('¿Eliminar esta membresía?');">
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
                    <td colspan="4" class="text-center text-muted">
                        No hay membresías registradas.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
