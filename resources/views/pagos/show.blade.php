@extends('layouts.private')

@section('contenido')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col p-md-0">
            <h4>MisSEXO Pagos</h4>
        </div>
    </div>


    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($pagos->count())
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped verticle-middle">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Membresía</th>
                                        <th>Monto</th>
                                        <th>Fecha de Pago</th>
                                        <th>Método de Pago</th>
                                        <th>Observaciones</th>
                                        <th>QR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pagos as $i => $pago)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $pago->membresia->nombre }}</td>
                                            <td>S/ {{ number_format($pago->monto, 2) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</td>
                                            <td>
                                                @switch($pago->metodo_pago)
                                                    @case('efectivo')
                                                        <span class="badge badge-success">Efectivo</span>
                                                        @break
                                                    @case('transferencia')
                                                        <span class="badge badge-info">Transferencia</span>
                                                        @break
                                                    @case('QR')
                                                        <span class="badge badge-warning">QR</span>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td>{{ $pago->observaciones ?? 'Sin observaciones' }}</td>
                                            <td>
                                                @if($pago->imagen_qr)
                                                    <a href="{{ asset('storage/' . $pago->imagen_qr) }}" target="_blank">
                                                        <img src="{{ asset('storage/' . $pago->imagen_qr) }}" alt="QR" width="50" height="50">
                                                    </a>
                                                @else
                                                    <span class="text-muted">No aplica</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            <h5>Resumen de Pagos</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body">
                                            <h6 class="card-title">Total Pagado</h6>
                                            <h4>S/ {{ number_format($pagos->sum('monto'), 2) }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-info text-white">
                                        <div class="card-body">
                                            <h6 class="card-title">N° de Pagos</h6>
                                            <h4>{{ $pagos->count() }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-success text-white">
                                        <div class="card-body">
                                            <h6 class="card-title">Promedio por Pago</h6>
                                            <h4>S/ {{ number_format($pagos->avg('monto'), 2) }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info text-center">
                            <i class="fa fa-info-circle"></i> Todavía no tienes pagos registrados.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection