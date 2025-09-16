<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte - Pagos por Mes</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte de Pagos por Mes</h2>
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
</body>
</html>
