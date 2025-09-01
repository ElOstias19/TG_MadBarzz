@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2 class="mb-4">Listado de Pagos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pagos.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-circle-plus me-2"></i> Nuevo Pago
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
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
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pagos as $pago)
                    <tr>
                        <td>{{ $pago->id_pago }}</td>
                        <td>
                            {{ $pago->cliente->persona->nombre_completo ?? '' }}
                            {{ $pago->cliente->persona->apellido_paterno ?? '' }}
                            {{ $pago->cliente->persona->apellido_materno ?? '' }}
                        </td>
                        <td>{{ $pago->membresia->tipo_membresia ?? '' }}</td>
                        <td>{{ $pago->monto }}</td>
                        <td>{{ $pago->fecha_pago }}</td>
                        <td>{{ $pago->metodo_pago }}</td>
                        <td>{{ $pago->observaciones }}</td>
                        <td class="text-center">
                            @if($pago->imagen_qr)
                                <img src="{{ asset('storage/'.$pago->imagen_qr) }}" alt="QR" width="100">
                            @else
                                No hay imagen
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-1">
                                <a href="{{ route('pagos.edit', $pago) }}" 
                                   class="btn btn-warning btn-sm" 
                                   title="Editar">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('pagos.destroy', $pago) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('¿Eliminar pago?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No hay pagos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
