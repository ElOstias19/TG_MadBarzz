@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Enviar Mensaje WhatsApp</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notificaciones.sendWhatsapp') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_cliente">Seleccionar Cliente</label>
            <select name="id_cliente" id="id_cliente" class="form-control" required>
                <option value="">-- Seleccione un cliente --</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}" {{ old('id_cliente') == $cliente->id_cliente ? 'selected' : '' }}>
                        {{ $cliente->persona->nombre_completo ?? 'Sin nombre' }} ({{ $cliente->persona->telefono ?? 'Sin teléfono' }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="mensaje">Mensaje</label>
            <textarea name="mensaje" id="mensaje" class="form-control" rows="4" required>{{ old('mensaje') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enviar WhatsApp</button>
    </form>
</div>
@endsection
