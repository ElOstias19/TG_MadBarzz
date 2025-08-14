@extends('layouts.private')

@section('contenido')

<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-xl-12">
            <div class="card custom-card">

                <div class="card-header">
                    <div class="card-title fs-24 fw-bold text-dark dark-text-white">
                        <h2 class="fw-bold mb-0">Editar Rutina</h2>
                    </div>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger mb-3">
                            <strong>Errores:</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('rutinas.update', $rutina->id_rutina) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="titulo" class="form-label fw-bold text-dark dark-text-white">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $rutina->titulo) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="descripcion" class="form-label fw-bold text-dark dark-text-white">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" rows="4">{{ old('descripcion', $rutina->descripcion) }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="archivo" class="form-label fw-bold text-dark dark-text-white">Cambiar imagen (opcional)</label>
                                <input type="file" name="archivo" id="archivo" class="form-control" accept="image/*" onchange="previewImage(event)">
                            </div>

                            <div class="col-md-12 text-center">
                                @if($rutina->archivo)
                                    <p>Imagen actual:</p>
                                    <img src="{{ asset('storage/' . $rutina->archivo) }}" alt="Imagen actual" style="max-width:300px; height:auto; border:2px solid #ccc; padding:5px; border-radius:8px; margin-bottom:10px;">
                                @endif
                                <img id="preview" src="#" alt="Vista previa" style="display:none; max-width:300px; height:auto; border:2px solid #ccc; padding:5px; border-radius:8px;">
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-save me-2"></i> Actualizar Rutina
                            </button>
                            <a href="{{ route('rutinas.index') }}" class="btn btn-secondary ms-2">
                                Cancelar
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    let reader = new FileReader();
    reader.onload = function(){
        let output = document.getElementById('preview');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection
