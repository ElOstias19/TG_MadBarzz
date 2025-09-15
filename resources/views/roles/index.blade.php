@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Listado de Roles</h2>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">
        <i class="ti ti-plus me-2 fs-5"></i> Agregar nuevo rol
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($roles as $rol)
                <tr>
                    <td>{{ $rol->id }}</td>
                    <td>{{ $rol->nombre }}</td>
                    <td class="d-flex justify-content-center align-items-center gap-1">
                        <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-warning btn-sm content-icon" aria-label="Editar rol {{ $rol->nombre }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar el rol {{ $rol->nombre }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm content-icon" aria-label="Eliminar rol {{ $rol->nombre }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay roles registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
