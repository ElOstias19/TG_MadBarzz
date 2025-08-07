@extends('layouts.private')

@section('contenido')
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Lista de Membresías</h4>
                <a href="{{ route('membresias.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Nueva Membresía
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
                            <th>Tipo</th>
                            <th>Precio</th>
                            <th>Descuento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($membresias as $membresia)
                            <tr>
                                <td>{{ $membresia->id_membresia }}</td>
                                <td>{{ $membresia->tipo_membresia }}</td>
                                <td>{{ $membresia->precio }}</td>
                                <td>{{ $membresia->descuento }}</td>
                                <td>
                                    <a href="{{ route('membresias.edit', $membresia->id_membresia) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('membresias.destroy', $membresia->id_membresia) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta membresía?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No hay membresías registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
