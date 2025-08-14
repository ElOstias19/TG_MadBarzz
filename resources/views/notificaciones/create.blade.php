@extends('layouts.private')

@section('contenido')

<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-xl-12">
            <div class="card custom-card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title fs-24 fw-bold text-dark dark-text-white">
                        <h2 class="fw-bold mb-0">Enviar Notificación WhatsApp</h2>
                    </div>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger mb-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('notificaciones.store') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="id_cliente" class="form-label fw-bold text-dark dark-text-white">Cliente</label>
                                <select name="id_cliente" id="id_cliente" class="form-control" required>
                                    <option value="">-- Seleccione un cliente --</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id_cliente }}" data-nombre="{{ $cliente->persona->nombre_completo ?? '' }}" {{ old('id_cliente') == $cliente->id_cliente ? 'selected' : '' }}>
                                            {{ $cliente->persona->nombre_completo ?? 'Sin nombre' }} - CI: {{ $cliente->persona->ci ?? '---' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="tipo" class="form-label fw-bold text-dark dark-text-white">Tipo de Notificación</label>
                                <select name="tipo" id="tipo" class="form-control" required>
                                    <option value="">-- Seleccione tipo --</option>
                                    <option value="recordatorio_vencimiento" {{ old('tipo') == 'recordatorio_vencimiento' ? 'selected' : '' }}>Recordatorio Vencimiento</option>
                                    <option value="bienvenida" {{ old('tipo') == 'bienvenida' ? 'selected' : '' }}>Bienvenida</option>
                                    <option value="promocion" {{ old('tipo') == 'promocion' ? 'selected' : '' }}>Promoción</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="mensaje" class="form-label fw-bold text-dark dark-text-white">Mensaje</label>
                                <textarea name="mensaje" id="mensaje" rows="5" class="form-control" required>{{ old('mensaje') }}</textarea>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-paper-plane me-2"></i> Enviar Notificación
                            </button>
                            <a href="{{ route('notificaciones.index') }}" class="btn btn-secondary ms-2">
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
    const clienteSelect = document.getElementById('id_cliente');
    const tipoSelect = document.getElementById('tipo');
    const mensajeTextarea = document.getElementById('mensaje');

    function actualizarMensaje() {
        const clienteNombre = clienteSelect.selectedOptions[0]?.dataset.nombre || '';
        const tipo = tipoSelect.value;

        let mensaje = '';

        if(tipo === 'recordatorio_vencimiento') {
            mensaje = `Hola ${clienteNombre}, tu membresía está por vencer. ¡No olvides renovarla a tiempo!`;
        } else if(tipo === 'bienvenida') {
            mensaje = `Hola ${clienteNombre}, ¡bienvenido a nuestro gimnasio! Estamos felices de tenerte con nosotros.`;
        } else if(tipo === 'promocion') {
            mensaje = `Hola ${clienteNombre}, tenemos una promoción especial para ti. ¡No te la pierdas!`;
        }

        mensajeTextarea.value = mensaje;
    }

    clienteSelect.addEventListener('change', actualizarMensaje);
    tipoSelect.addEventListener('change', actualizarMensaje);
</script>

@endsection
