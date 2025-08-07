@extends('layouts.private')

@section('contenido')
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Membresías por Cliente</h4>
                <a href="{{ route('membresia_cliente.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Asignar Membresía
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Membresía</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($membresiasClientes as $mc)
                            <tr>
                                <td>{{ $mc->id }}</td>
                                <td>{{ $mc->cliente->persona->nombre_completo ?? 'N/A' }}</td>
                                <td>{{ $mc->membresia->tipo_membresia ?? 'N/A' }}</td>
                                <td>{{ $mc->fecha_inicio }}</td>
                                <td>{{ $mc->fecha_fin }}</td>
                                <td>
                                    <a href="{{ route('membresia_cliente.edit', $mc->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('membresia_cliente.destroy', $mc->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar registro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No hay asignaciones de membresía.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
