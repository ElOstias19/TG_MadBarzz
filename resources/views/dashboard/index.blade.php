@extends('layouts.private')

@section('contenido')
    <!-- Sección de Bienvenida -->
    <div class="col-12 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h2 class="text-white">¡Bienvenido/a!</h2>
                <p class="mb-0">Estamos encantados de tenerte aquí. A la izquierda encontrarás todas las funciones disponibles para gestionar tu contenido.</p>
            </div>
        </div>
    </div>

<!-- TABLA DE CLIENTES ACTIVOS -->
<div class="col-12 mb-4">
    <div class="card">
        <div class="card-header">
            <h4>Clientes Activos</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Completo</th>
                        <th>CI</th>
                        <th>Teléfono</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id_cliente }}</td>
                        <td>{{ $cliente->persona->nombre_completo ?? '-' }}</td>
                        <td>{{ $cliente->persona->ci ?? '-' }}</td>
                        <td>{{ $cliente->persona->telefono ?? '-' }}</td>
                        <td>{{ $cliente->estado }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- TABLA DE ENTRENADORES ACTIVOS -->
<div class="col-12 mb-4">
    <div class="card">
        <div class="card-header">
            <h4>Entrenadores Activos</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Completo</th>
                        <th>CI</th>
                        <th>Teléfono</th>
                        <th>Especialidad</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entrenadores as $entrenador)
                    <tr>
                        <td>{{ $entrenador->id_entrenador }}</td>
                        <td>{{ $entrenador->persona->nombre_completo ?? '-' }}</td>
                        <td>{{ $entrenador->persona->ci ?? '-' }}</td>
                        <td>{{ $entrenador->persona->telefono ?? '-' }}</td>
                        <td>
                            {{ is_array($entrenador->especialidad) ? implode(', ', $entrenador->especialidad) : $entrenador->especialidad }}
                        </td>
                        <td>{{ $entrenador->estado }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
