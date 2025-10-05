@extends('layouts.private')

@section('contenido')

<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-xl-12">
            <div class="card custom-card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title fs-24 fw-bold text-dark dark-text-white">
                        <h2 class="fw-bold mb-0">Registrar Pago</h2>
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

                    <form action="{{ route('pagos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">

                            {{-- Selección de cliente --}}
                            <div class="col-md-6">
                                <label for="id_cliente" class="form-label fw-bold text-dark dark-text-white">Cliente</label>
                                <select name="id_cliente" id="id_cliente" class="form-control" required>
                                    <option value="">Seleccione un cliente</option>
                                    @foreach($clientes as $cliente)
                                        @php
                                            $membresiaAsignada = $cliente->membresiasClientes()->latest('fecha_fin')->first();
                                        @endphp
                                        <option 
                                            value="{{ $cliente->id_cliente }}"
                                            data-membresia-id="{{ $membresiaAsignada->id_membresia ?? '' }}"
                                            data-membresia="{{ $membresiaAsignada->membresia->tipo_membresia ?? '' }}"
                                            data-precio="{{ $membresiaAsignada->precio_final ?? '' }}"
                                        >
                                            {{ $cliente->persona->nombre_completo ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Membresía (autocompletada y bloqueada) --}}
                            <div class="col-md-6">
                                <label for="membresia" class="form-label fw-bold text-dark dark-text-white">Membresía</label>
                                <input type="text" name="membresia" id="membresia" class="form-control" readonly placeholder="Seleccione un cliente">
                                <input type="hidden" name="id_membresia" id="id_membresia">
                            </div>

                            {{-- Monto (autocompletado y bloqueado) --}}
                            <div class="col-md-6">
                                <label for="monto" class="form-label fw-bold text-dark dark-text-white">Monto</label>
                                <input type="number" step="0.01" name="monto" id="monto" class="form-control" required readonly>
                            </div>

                            {{-- Fecha de pago --}}
                            <div class="col-md-6">
                                <label for="fecha_pago" class="form-label fw-bold text-dark dark-text-white">Fecha de pago</label>
                                <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" required>
                            </div>

                            {{-- Método de pago --}}
                            <div class="col-md-6">
                                <label for="metodo_pago" class="form-label fw-bold text-dark dark-text-white">Método de pago</label>
                                <select name="metodo_pago" id="metodo_pago" class="form-control" required>
                                    <option value="efectivo">Efectivo</option>
                                    <option value="transferencia">Transferencia</option>
                                    <option value="QR">QR</option>
                                </select>
                            </div>

                            {{-- Observaciones --}}
                            <div class="col-md-6">
                                <label for="observaciones" class="form-label fw-bold text-dark dark-text-white">Observaciones</label>
                                <textarea name="observaciones" id="observaciones" class="form-control"></textarea>
                            </div>

                            {{-- Sección QR --}}
                            <div id="qrSection" style="display:none;">
                                <div class="col-md-12 text-center">
                                    <label class="form-label fw-bold text-dark dark-text-white">QR de pago (referencia)</label><br>
                                    <img src="{{ asset('assets/images/QR0994.jpg') }}" alt="QR de pago" style="max-width: 300px; margin-bottom: 20px;">
                                </div>

                                <div class="col-md-12 text-center">
                                    <label for="imagen_qr" class="form-label fw-bold text-dark dark-text-white">Imagen QR del pago (subir archivo)</label>
                                    <input type="file" name="imagen_qr" id="imagen_qr" class="form-control" accept="image/*" onchange="previewImage(event)">
                                    <div class="mt-3">
                                        <img id="preview" src="#" alt="Vista previa" style="max-width: 300px; display: none; border: 1px solid #ccc; padding: 5px;">
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Botones --}}
                        <div class="mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-save me-2"></i> Guardar Pago
                            </button>
                            <a href="{{ route('pagos.index') }}" class="btn btn-secondary ms-2">
                                Cancelar
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Scripts --}}
<script>
const clienteSelect = document.getElementById('id_cliente');
const membresiaInput = document.getElementById('membresia');
const idMembresiaInput = document.getElementById('id_membresia');
const montoInput = document.getElementById('monto');
const metodoPago = document.getElementById('metodo_pago');

clienteSelect.addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const tipoMembresia = selectedOption.getAttribute('data-membresia');
    const precio = selectedOption.getAttribute('data-precio');
    const idMembresia = selectedOption.getAttribute('data-membresia-id');

    membresiaInput.value = tipoMembresia || '';
    montoInput.value = precio || '';
    idMembresiaInput.value = idMembresia || '';
});

metodoPago.addEventListener('change', function() {
    const qrSection = document.getElementById('qrSection');
    if(this.value === 'QR' || this.value === 'transferencia') {
        qrSection.style.display = 'block';
    } else {
        qrSection.style.display = 'none';
        document.getElementById('imagen_qr').value = '';
        document.getElementById('preview').style.display = 'none';
    }
});

function previewImage(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];
    if(file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.style.display = 'none';
    }
}
</script>

@endsection
