@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Lista de Administradores</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('administradores.create') }}" class="btn btn-primary mb-3">Nuevo Administrador</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Email</th>
                <th>Nivel de Acceso</th>
                <th>Área Responsable</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($administradores as $admin)
                <tr>
                    <td>{{ $admin->id_administrador }}</td>
                    <td>{{ $admin->persona->nombre_completo }} {{ $admin->persona->apellido_paterno }} {{ $admin->persona->apellido_materno }}</td>
                    <td>{{ $admin->user->email }}</td>
                    <td>{{ ucfirst($admin->nivel_acceso) }}</td>
                    <td>{{ $admin->area_responsable }}</td>
                    <td>{{ ucfirst($admin->estado) }}</td>
                    <td>
                        <a href="{{ route('administradores.edit', $admin->id_administrador) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('administradores.destroy', $admin->id_administrador) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar este administrador?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay administradores registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
