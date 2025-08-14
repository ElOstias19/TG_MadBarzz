@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2 class="mb-4">Lista de Administradores</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('administradores.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-circle-plus me-2"></i> Nuevo Administrador
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle w-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Email</th>
                    <th>Nivel de Acceso</th>
                    <th>Área Responsable</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($administradores as $admin)
                    <tr>
                        <td>{{ $admin->id_administrador }}</td>
                        <td>{{ $admin->persona->nombre_completo ?? '' }} {{ $admin->persona->apellido_paterno ?? '' }} {{ $admin->persona->apellido_materno ?? '' }}</td>
                        <td>{{ $admin->user->email ?? 'Sin correo' }}</td>
                        <td>{{ ucfirst($admin->nivel_acceso ?? 'N/A') }}</td>
                        <td>{{ $admin->area_responsable ?? 'N/A' }}</td>
                        <td>
                            <span class="badge {{ $admin->estado === 'activo' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($admin->estado ?? 'N/A') }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-1">
                                <a href="{{ route('administradores.edit', $admin->id_administrador) }}" 
                                   class="btn btn-warning btn-sm" 
                                   title="Editar">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('administradores.destroy', $admin->id_administrador) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('¿Seguro que deseas eliminar este administrador?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay administradores registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
