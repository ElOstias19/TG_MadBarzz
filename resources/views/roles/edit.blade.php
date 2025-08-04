@extends('layouts.private')

@section('contenido')

<div class="row">

<div class="col-xl-12">

<div class="card custom-card">

<div class="card-header justify-content-between">

<div class="card-title">
Editar rol
</div>

</div>

<div class="card-body">

<form method="POST" action="{{ route('roles.update', $rol->id) }}">

@csrf

@method('PUT')

<div class="row">

<div class="col-6">

<div class="mb-3">

<label for="nombre" class="form-label fs-14 text-dark">Nombre</label>

<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $rol->nombre }}" required>

</div>

</div>

<!-- Si luego decides agregar más campos como estado, descripción, etc., puedo ayudarte a extender el formulario -->

</div>

<button class="btn btn-primary" type="submit">Guardar cambios</button>

</form>

</div>

</div>

</div>

</div>

@endsection
