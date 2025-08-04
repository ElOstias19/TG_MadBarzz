@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">
                    Lista de Usuarios
                </div>
                <div>
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-circle-plus me-2"></i> Agregar Usuario
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-nowrap w-100">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nombre de Usuario</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->rol->nombre ?? 'Sin rol' }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('users.edit', $usuario->id) }}"
                                           class="btn btn-warning btn-sm me-1"
                                           title="Editar {{ $usuario->name }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('users.destroy', $usuario->id) }}"
                                              method="POST"
                                              style="display:inline;"
                                              onsubmit="return confirm('¿Estás seguro de eliminar a {{ $usuario->name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No hay usuarios registrados.</td>
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
