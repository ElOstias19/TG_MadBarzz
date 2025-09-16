@extends('layouts.private')

@section('contenido')
<div class="container">
    
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    <h2 class="text-center">Pagos del Mes</h2>
    <a href="{{ route('reportes.pagos.mes.pdf') }}" class="btn btn-danger mb-3">Exportar PDF</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>CI</th>
                <th>Fecha Pago</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pagos as $index => $pago)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pago->cliente->persona->nombre_completo ?? 'N/A' }}
                {{ $pago->cliente->persona->apellido_paterno ?? 'N/A' }}
                {{ $pago->cliente->persona->apellido_materno ?? 'N/A' }}</td>
                <td>{{ $pago->cliente->persona->ci ?? 'N/A' }}</td>
                <td>{{ $pago->fecha_pago->format('d/m/Y') }}</td>
                <td>{{ number_format($pago->monto, 2) }} Bs</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
