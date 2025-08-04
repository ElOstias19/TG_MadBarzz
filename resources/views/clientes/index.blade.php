@extends('layouts.private')

@section('contenido')
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">Lista de Clientes</div>
                <div>
                    <a href="{{ route('clientes.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-circle-plus me-2"></i> Agregar Cliente
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
                                <th>Nombre Completo</th>
                                <th>CI</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Usuario</th>
                                <th>Días Asistidos</th>
                                <th>Huella Digital</th>
                                <th>Estado</th>
                                <th class="text">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->id_cliente }}</td>
                                    <td>{{ $cliente->persona->nombre_completo ?? 'Sin nombre' }}</td>
                                    <td>{{ $cliente->persona->ci ?? 'Sin CI' }}</td>
                                    <td>{{ $cliente->persona->telefono ?? 'Sin teléfono' }}</td>
                                    <td>{{ $cliente->user->email ?? 'Sin correo' }}</td>
                                    <td>{{ $cliente->user->name ?? 'Sin usuario' }}</td>
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
                                    <td class="text-end">
                                        <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este cliente?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="10" class="text-center">No hay clientes registrados.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
