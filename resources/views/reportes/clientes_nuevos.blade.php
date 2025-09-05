@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2 class="text-center">Clientes Nuevos del Mes</h2>
    <a href="{{ route('reportes.clientes.nuevos.pdf') }}" class="btn btn-danger mb-3">Exportar PDF</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nombre Completo</th>
                <th>CI</th>
                <th>Fecha Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $index => $cliente)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $cliente->persona->nombre_completo ?? 'N/A' }}</td>
                <td>{{ $cliente->persona->ci ?? 'N/A' }}</td>
                <td>{{ $cliente->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
