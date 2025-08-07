@extends('layouts.private')

@section('contenido')
<div class="col-xl-6 offset-xl-3">
    <div class="card custom-card">
        <div class="card-header">
            <h4>Editar Membresía</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('membresias.update', $membresia->id_membresia) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Tipo</label>
                    <input type="text" name="tipo_membresia" value="{{ $membresia->tipo_membresia }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Precio</label>
                    <input type="number" step="0.01" name="precio" value="{{ $membresia->precio }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Descuento</label>
                    <input type="number" step="0.01" name="descuento" value="{{ $membresia->descuento }}" class="form-control">
                </div>
                <button class="btn btn-primary">Actualizar</button>
                <a href="{{ route('membresias.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
