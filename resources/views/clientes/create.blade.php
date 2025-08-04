@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Registrar Cliente</h2>

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <h4>Datos de la Persona</h4>

        <div class="form-group">
            <label>Nombre Completo:</label>
            <input type="text" name="nombre_completo" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Apellido Paterno:</label>
            <input type="text" name="apellido_paterno" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Apellido Materno:</label>
            <input type="text" name="apellido_materno" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Cédula de Identidad:</label>
            <input type="text" name="ci" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Teléfono:</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Género:</label>
            <select name="genero" class="form-control" required>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select>
        </div>

        <div class="form-group">
            <label>Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" class="form-control" required>
        </div>

        <hr>
        <h4>Datos del Usuario</h4>

        <div class="form-group">
            <label>Nombre de Usuario:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Contraseña:</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <hr>
        <h4>Datos del Cliente</h4>

        <div class="form-group">
            <label>Días Asistidos:</label>
            <input type="number" name="dias_asistidos" class="form-control" value="0" min="0" required>
        </div>

        <div class="form-group">
            <label>Huella Digital (opcional):</label>
            <input type="text" name="huella_digital" class="form-control" placeholder="Hash o identificador">
        </div>

        <div class="form-group">
            <label>Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="activo" selected>Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
@endsection
