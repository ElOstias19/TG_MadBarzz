@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Listado de Clientes</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-circle-plus me-2"></i> Agregar Cliente
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>CI</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Usuario</th>
                <th>Días Asistidos</th>
                <th>Huella Digital</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id_cliente }}</td>
                    <td>{{ optional($cliente->persona)->nombre_completo ?? 'Sin nombre' }}</td>
                    <td>{{ optional($cliente->persona)->ci ?? 'Sin CI' }}</td>
                    <td>{{ optional($cliente->persona)->telefono ?? 'Sin teléfono' }}</td>
                    <td>{{ optional($cliente->user)->email ?? 'Sin correo' }}</td>
                    <td>{{ optional($cliente->user)->name ?? 'Sin usuario' }}</td>
                    <td>{{ $cliente->dias_asistidos }}</td>
                    <td>
                        @if ($cliente->huella_digital)
                            <span class="badge bg-success">Registrada</span>
                        @else
                            <span class="badge bg-secondary">No registrada</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge {{ $cliente->estado == 'activo' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($cliente->estado) }}
                        </span>
                    </td>
                    <td class="d-flex justify-content-center align-items-center gap-1">
                        <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" 
                           class="btn btn-warning btn-sm" 
                           title="Editar">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" 
                              method="POST" 
                              style="display:inline;" 
                              onsubmit="return confirm('¿Estás seguro de eliminar este cliente?');">
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
                    <td colspan="10" class="text-center">No hay clientes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
