@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2 class="mb-4">Registrar Nueva Membresía</h2>

    {{-- Mostrar errores de validación --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario --}}
    <form action="{{ route('membresias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tipo_membresia" class="form-label">Tipo de Membresía</label>
            <input type="text" name="tipo_membresia" id="tipo_membresia" class="form-control"
                   value="{{ old('tipo_membresia') }}" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio (Bs)</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control"
                   value="{{ old('precio') }}" required>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-save me-2"></i> Guardar
        </button>
        <a href="{{ route('membresias.index') }}" class="btn btn-secondary">
            Cancelar
        </a>
    </form>
</div>
@endsection
