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
    <br>

    <div class="d-flex justify-content-between mb-3">
        {{-- Botón Exportar PDF --}}
        <a href="{{ route('reportes.pagos.mes.pdf', request()->all()) }}" class="btn btn-danger">Exportar PDF</a>

        {{-- Formulario de filtro --}}
        <form method="GET" action="{{ route('reportes.pagos.mes') }}" class="d-flex">
            <select name="mes" class="me-2 form-control">
                <option value="">Mes</option>
                @for($m=1; $m<=12; $m++)
                    <option value="{{ $m }}" {{ request('mes') == $m ? 'selected' : '' }}>
                        {{ \Carbon\Carbon::create()->month($m)->locale('es')->isoFormat('MMMM') }}
                    </option>
                @endfor
            </select>

<select name="anio" class="me-2 form-control">
    <option value="">Año</option>
    @for($y = 2025; $y <= 2045; $y++)
        <option value="{{ $y }}" {{ request('anio') == $y ? 'selected' : '' }}>{{ $y }}</option>
    @endfor
</select>



            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>
    </div>

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
            @forelse($pagos as $index => $pago)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        {{ $pago->cliente->persona->nombre_completo ?? 'N/A' }}
                        {{ $pago->cliente->persona->apellido_paterno ?? '' }}
                        {{ $pago->cliente->persona->apellido_materno ?? '' }}
                    </td>
                    <td>{{ $pago->cliente->persona->ci ?? 'N/A' }}</td>
                    <td>{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</td>
                    <td>{{ number_format($pago->monto, 2) }} Bs</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No se encontraron pagos para el filtro seleccionado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
