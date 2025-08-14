@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title fs-24 fw-bold text-dark dark-text-white">
                    <h2 class=" fw-bold mb-4">Editar Membresía</h2>
                </div>

            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('membresias.update', $membresia->id_membresia) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Tipo</label>
                            <input type="text" name="tipo_membresia" 
                                   value="{{ old('tipo_membresia', $membresia->tipo_membresia) }}" 
                                   class="form-control" placeholder="Ingrese el tipo de membresía" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Precio</label>
                            <input type="number" step="0.01" name="precio" 
                                   value="{{ old('precio', $membresia->precio) }}" 
                                   class="form-control" placeholder="Ingrese el precio" required>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-pen-to-square me-2"></i> Actualizar
                        </button>
                        <a href="{{ route('membresias.index') }}" class="btn btn-secondary ms-2">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
