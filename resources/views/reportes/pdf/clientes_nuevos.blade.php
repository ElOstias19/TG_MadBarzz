<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte - Clientes Nuevos del Mes</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2, h4 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte de Clientes Nuevos</h2>
<BR></BR>
    @if(isset($mes) && isset($anio))
        <h4>Mes: {{ \Carbon\Carbon::createFromDate($anio, $mes, 1)->locale('es')->isoFormat('MMMM') }} / Año: {{ $anio }}</h4>
    @endif

    <table>
        <thead>
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
                <td>{{ \Carbon\Carbon::parse($cliente->created_at)->format('d/m/Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No hay clientes nuevos en este mes.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
