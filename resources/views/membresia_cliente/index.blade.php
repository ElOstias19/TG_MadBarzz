@extends('layouts.private')

@section('contenido')
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">Membresías por Cliente</div>
                <div>
                    <a href="{{ route('membresia_cliente.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-circle-plus me-2"></i> Asignar Membresía
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
                                <th>Cliente</th>
                                <th>Membresía</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Nombre Descuento</th>
                                <th>Descuento (%)</th>
                                <th>Precio Final (Bs)</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($membresiasClientes as $mc)
                                <tr>
                                    <td>{{ $mc->id }}</td>
                                    <td>{{ $mc->cliente->persona->nombre_completo ?? 'N/A' }} {{ $mc->cliente->persona->apellido_paterno ?? '' }} {{ $mc->cliente->persona->apellido_materno ?? '' }}</td>
                                    <td>{{ $mc->membresia->tipo_membresia ?? 'N/A' }}</td>
                                    <td>{{ $mc->fecha_inicio }}</td>
                                    <td>{{ $mc->fecha_fin }}</td>
                                    <td>{{ $mc->nombre_descuento ?? 'N/A' }}</td>
                                    <td>{{ $mc->descuento ?? '0' }}</td>
                                    <td>{{ number_format($mc->precio_final ?? 0, 2) }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('membresia_cliente.edit', $mc->id) }}" class="btn btn-warning btn-sm me-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('membresia_cliente.destroy', $mc->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar registro?')">
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
                                    <td colspan="9" class="text-center">No hay asignaciones de membresía.</td>
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
