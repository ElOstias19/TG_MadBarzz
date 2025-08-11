@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Listado de Pagos</h2>
    <a href="{{ route('pagos.create') }}" class="btn btn-primary mb-3">Nuevo Pago</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Membresía</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Método</th>
                <th>Observaciones</th>
                <th>QR</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pagos as $pago)
                <tr>
                    <td>{{ $pago->id_pago }}</td>
                    <td>{{ $pago->cliente->persona->nombre_completo }}</td>
                    <td>{{ $pago->membresia->nombre }}</td>
                    <td>{{ $pago->monto }}</td>
                    <td>{{ $pago->fecha_pago }}</td>
                    <td>{{ $pago->metodo_pago }}</td>
                    <td>{{ $pago->observaciones }}</td>
                    <td>
                        @if($pago->imagen_qr)
                            <img src="{{ asset('storage/'.$pago->imagen_qr) }}" alt="QR" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pagos.edit', $pago) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pagos.destroy', $pago) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar pago?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
