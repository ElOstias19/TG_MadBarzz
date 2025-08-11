@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Editar Rutina</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Errores:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rutinas.update', $rutina->id_rutina) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $rutina->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4">{{ old('descripcion', $rutina->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="archivo">Cambiar imagen (opcional)</label>
            <input type="file" name="archivo" id="archivo" class="form-control" accept="image/*" onchange="previewImage(event)">
        </div>

        <div class="mb-3 text-center">
            @if($rutina->archivo)
                <p>Imagen actual:</p>
                <img src="{{ asset('storage/' . $rutina->archivo) }}" alt="Imagen actual" style="max-width:300px; height:auto; border:2px solid #ccc; padding:5px; border-radius:8px; margin-bottom:10px;">
            @endif
            <img id="preview" src="#" alt="Vista previa" style="display:none; max-width:300px; height:auto; border:2px solid #ccc; padding:5px; border-radius:8px;">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Rutina</button>
        <a href="{{ route('rutinas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
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
