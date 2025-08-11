@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Registrar Asistencia por Huella</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('asistencias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="huella_digital" class="form-label">Huella Digital</label>
            <input type="text" name="huella_digital" id="huella_digital" class="form-control" placeholder="Ingresa la huella digital" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Asistencia</button>
    </form>
</div>
@endsection
