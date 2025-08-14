@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Listado de Membresías</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('membresias.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-circle-plus me-2"></i> Nueva Membresía
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($membresias as $membresia)
                <tr>
                    <td>{{ $membresia->id_membresia }}</td>
                    <td>{{ $membresia->tipo_membresia }}</td>
                    <td>{{ number_format($membresia->precio, 2) }} Bs</td>
                    <td class="d-flex justify-content-center gap-1">
                        <a href="{{ route('membresias.edit', $membresia->id_membresia) }}" 
                           class="btn btn-warning btn-sm" 
                           title="Editar">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('membresias.destroy', $membresia->id_membresia) }}" 
                              method="POST" 
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
                    <td colspan="4" class="text-center">No hay membresías registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
