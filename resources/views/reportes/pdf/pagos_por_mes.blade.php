<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte - Pagos por Mes</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2, h4 { text-align: center; margin: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte de Pagos por Mes</h2>
    <br>

    @if(isset($mes) && isset($anio))
        <h4>
            Mes: {{ \Carbon\Carbon::createFromDate($anio, $mes, 1)->locale('es')->isoFormat('MMMM') }} /
            Año: {{ $anio }}
        </h4>
    @endif

    <table>
        <thead>
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
                    {{ $pago->cliente->persona->nombre_completo ?? '' }}
                    {{ $pago->cliente->persona->apellido_paterno ?? '' }}
                    {{ $pago->cliente->persona->apellido_materno ?? '' }}
                </td>
                <td>{{ $pago->cliente->persona->ci ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</td>
                <td>{{ number_format($pago->monto, 2) }} Bs</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No se registraron pagos en este mes.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
