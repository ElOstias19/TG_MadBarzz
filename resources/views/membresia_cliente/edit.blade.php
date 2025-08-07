@extends('layouts.private')

@section('contenido')
<div class="col-xl-6 offset-xl-3">
    <div class="card custom-card">
        <div class="card-header">
            <h4>Editar Membresía de Cliente</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('membresia_cliente.update', $membresiaCliente->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Cliente</label>
                    <select name="id_cliente" class="form-control" required>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id_cliente }}" {{ $cliente->id_cliente == $membresiaCliente->id_cliente ? 'selected' : '' }}>
                                {{ $cliente->persona->nombre_completo }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Membresía</label>
                    <select name="id_membresia" class="form-control" required>
                        @foreach($membresias as $membresia)
                            <option value="{{ $membresia->id_membresia }}" {{ $membresia->id_membresia == $membresiaCliente->id_membresia ? 'selected' : '' }}>
                                {{ $membresia->tipo_membresia }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" value="{{ $membresiaCliente->fecha_inicio }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Fecha Fin</label>
                    <input type="date" name="fecha_fin" value="{{ $membresiaCliente->fecha_fin }}" class="form-control" required>
                </div>
                <button class="btn btn-primary">Actualizar</button>
                <a href="{{ route('membresia_cliente.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
