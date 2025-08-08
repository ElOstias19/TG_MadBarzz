@extends('layouts.private')

@section('contenido')
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">Lista de Membresías</div>
                <div>
                    <a href="{{ route('membresias.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-circle-plus me-2"></i> Nueva Membresía
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
                                <th>Tipo</th>
                                <th>Precio</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($membresias as $membresia)
                                <tr>
                                    <td>{{ $membresia->id_membresia }}</td>
                                    <td>{{ $membresia->tipo_membresia }}</td>
                                    <td>{{ number_format($membresia->precio, 2) }} Bs</td>
                                    <td class="text-end">
                                        <a href="{{ route('membresias.edit', $membresia->id_membresia) }}" class="btn btn-warning btn-sm me-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('membresias.destroy', $membresia->id_membresia) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta membresía?')">
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
                                    <td colspan="4" class="text-center">No hay membresías registradas.</td>
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
