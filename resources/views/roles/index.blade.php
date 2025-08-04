@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">
                    Lista de roles
                </div>
                <div>
                    <div class="breadcrumb mb-0">
                        <a aria-label="anchor" href="{{ route('roles.create') }}" class="btn btn-primary ms-auto">
                            <i class="ti ti-plus me-2 fs-5"></i>Agregar
                        </a>
                    </div>

                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">

                    <table id="datatable-basic" class="table table-bordered text-nowrap w-100 table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Eliminado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($roles as $rol)
                                <tr>
                                    <td>{{ $rol->id }}</td>
                                    <td>{{ $rol->nombre }}</td>
                                    <td>{{ $rol->eliminado ? 'Sí' : 'No' }}</td>
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
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
