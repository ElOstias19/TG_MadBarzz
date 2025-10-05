<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte - Clientes Membresía Vencida</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2, h4 { text-align: center; margin: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .text-success { color: green; }
        .text-danger { color: red; }
    </style>
</head>
<body>
    <h2>Reporte de Clientes con Membresía Vencida o por Vencer</h2>
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
                <th>Teléfono</th>
                <th>Email</th>
                <th>Fecha Vencimiento</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clientes as $index => $cliente)
                @php
                    // Tomar la última membresía que vence en próximos 7 días
                    $ultimaMembresia = $cliente->membresias()
                        ->orderBy('fecha_fin', 'desc')
                        ->first();

                    $fechaFin = $ultimaMembresia 
                        ? \Carbon\Carbon::parse($ultimaMembresia->pivot->fecha_fin)->format('d/m/Y') 
                        : 'No registrada';

                    // Determinar color según estado
                    $colorEstado = strtolower($cliente->estado) === 'activo' ? 'text-success' : 'text-danger';
                @endphp

                @if($ultimaMembresia)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        {{ $cliente->persona->nombre_completo ?? 'N/A' }}
                        {{ $cliente->persona->apellido_paterno ?? '' }}
                        {{ $cliente->persona->apellido_materno ?? '' }}
                    </td>
                    <td>{{ $cliente->persona->ci ?? 'N/A' }}</td>
                    <td>{{ $cliente->persona->telefono ?? 'N/A' }}</td>
                    <td>{{ $cliente->user->email ?? 'N/A' }}</td>
                    <td>{{ $fechaFin }}</td>
                    <td class="{{ $colorEstado }} fw-bold">{{ ucfirst($cliente->estado) }}</td>
                </tr>
                @endif
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay clientes con membresía vencida o por vencer.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
