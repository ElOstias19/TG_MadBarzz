@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Enviar Notificación WhatsApp</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

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

    <form action="{{ route('notificaciones.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_cliente" class="form-label">Cliente</label>
            <select name="id_cliente" id="id_cliente" class="form-control" required>
                <option value="">-- Seleccione un cliente --</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}" {{ old('id_cliente') == $cliente->id_cliente ? 'selected' : '' }}>
                        {{ $cliente->persona->nombre_completo ?? 'Sin nombre' }} - CI: {{ $cliente->persona->ci ?? '---' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Notificación</label>
            <select name="tipo" id="tipo" class="form-control" required>
                <option value="">-- Seleccione tipo --</option>
                <option value="recordatorio_vencimiento" {{ old('tipo') == 'recordatorio_vencimiento' ? 'selected' : '' }}>Recordatorio Vencimiento</option>
                <option value="bienvenida" {{ old('tipo') == 'bienvenida' ? 'selected' : '' }}>Bienvenida</option>
                <option value="promocion" {{ old('tipo') == 'promocion' ? 'selected' : '' }}>Promoción</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea name="mensaje" id="mensaje" rows="5" class="form-control" required>{{ old('mensaje') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Enviar Notificación</button>
        <a href="{{ route('notificaciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
