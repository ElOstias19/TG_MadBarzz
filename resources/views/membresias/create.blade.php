@extends('layouts.private')

@section('contenido')
<div class="col-xl-6 offset-xl-3">
    <div class="card custom-card">
        <div class="card-header">
            <h4>Nueva Membresía</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('membresias.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Tipo</label>
                    <input type="text" name="tipo_membresia" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Precio</label>
                    <input type="number" step="0.01" name="precio" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Descuento</label>
                    <input type="number" step="0.01" name="descuento" class="form-control">
                </div>
                <button class="btn btn-success">Guardar</button>
                <a href="{{ route('membresias.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
