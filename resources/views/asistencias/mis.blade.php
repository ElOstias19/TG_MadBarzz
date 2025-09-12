@extends('layouts.private')

@section('contenido')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col p-md-0">
            <h4>Mis Asistencias</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($asistencias->count())
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped verticle-middle">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Hora de Entrada</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($asistencias as $i => $asistencia)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($asistencia->fecha_hora_entrada)->format('d/m/Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($asistencia->fecha_hora_entrada)->format('H:i:s') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info text-center">
                            <i class="fa fa-info-circle"></i> Todavía no tienes asistencias registradas.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection