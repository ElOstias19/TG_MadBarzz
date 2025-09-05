@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2 class="text-center">Clientes Activos e Inactivos</h2>
    <a href="{{ route('reportes.clientes.estado.pdf') }}" class="btn btn-danger mb-3">Exportar PDF</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nombre Completo</th>
                <th>CI</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $index => $cliente)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $cliente->persona->nombre_completo ?? 'N/A' }}</td>
                <td>{{ $cliente->persona->ci ?? 'N/A' }}</td>
                <td>{{ $cliente->persona->telefono ?? 'N/A' }}</td>
                <td>{{ $cliente->user->email ?? 'N/A' }}</td>
                <td>{{ ucfirst($cliente->estado) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
