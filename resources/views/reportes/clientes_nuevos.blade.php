@extends('layouts.private')

@section('contenido')
<div class="container">

    <h2 class="text-center mb-3">Clientes Nuevos</h2>
    <br>
    <br>
    <!-- Fila con botón PDF a la izquierda y filtro a la derecha -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Botón Exportar PDF a la izquierda -->
        <a href="{{ route('reportes.clientes.nuevos.pdf', ['mes' => $mes ?? Carbon\Carbon::now()->month, 'anio' => $anio ?? Carbon\Carbon::now()->year]) }}" class="btn btn-danger">
            Exportar PDF
        </a>

        <!-- Formulario de filtro a la derecha -->
        <form method="GET" action="{{ route('reportes.clientes.nuevos') }}" class="row g-2 align-items-center">
            <div class="col-auto">
                <select name="mes" class="">
                    @foreach($meses as $num => $nombre)
                        <option value="{{ $num }}" {{ (isset($mes) && $mes == $num) ? 'selected' : '' }}>
                            {{ ucfirst($nombre) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <select name="anio" class="">
                    @foreach($anios as $a)
                        <option value="{{ $a }}" {{ (isset($anio) && $anio == $a) ? 'selected' : '' }}>
                            {{ $a }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </form>
    </div>
<br>
    <!-- Tabla de clientes -->
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
            @forelse($clientes as $index => $cliente)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    {{ $cliente->persona->nombre_completo ?? 'N/A' }}
                    {{ $cliente->persona->apellido_paterno ?? '' }}
                    {{ $cliente->persona->apellido_materno ?? '' }}
                </td>
                <td>{{ $cliente->persona->ci ?? 'N/A' }}</td>
                <td>{{ $cliente->created_at ? \Carbon\Carbon::parse($cliente->created_at)->format('d/m/Y') : 'No registrada' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No hay clientes nuevos para este mes y año.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
