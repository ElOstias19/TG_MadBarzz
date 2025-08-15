@extends('layouts.private')

@section('contenido')

<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-xl-12">
            <div class="card custom-card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title fs-24 fw-bold text-dark dark-text-white">
                        <h2 class="fw-bold mb-0">Editar Pago</h2>
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

                    <form action="{{ route('pagos.update', $pago->id_pago) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="id_cliente" class="form-label fw-bold text-dark dark-text-white">Cliente</label>
                                <select name="id_cliente" id="id_cliente" class="form-control" required>
                                    <option value="">Seleccione un cliente</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id_cliente }}" 
                                            {{ $pago->id_cliente == $cliente->id_cliente ? 'selected' : '' }}>
                                            {{ $cliente->persona->nombre_completo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="id_membresia" class="form-label fw-bold text-dark dark-text-white">Membresía</label>
                                <select name="id_membresia" id="id_membresia" class="form-control" required>
                                    <option value="">Seleccione una membresía</option>
                                    @foreach($membresias as $membresia)
                                        <option 
                                            value="{{ $membresia->id_membresia }}" 
                                            data-precio="{{ $membresia->precio }}"
                                            {{ $pago->id_membresia == $membresia->id_membresia ? 'selected' : '' }}>
                                            {{ $membresia->tipo_membresia }} - Bs. {{ number_format($membresia->precio, 2) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="monto" class="form-label fw-bold text-dark dark-text-white">Monto</label>
                                <input type="number" step="0.01" name="monto" id="monto" class="form-control" value="{{ $pago->monto }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="fecha_pago" class="form-label fw-bold text-dark dark-text-white">Fecha de pago</label>
                                <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" value="{{ $pago->fecha_pago }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="metodo_pago" class="form-label fw-bold text-dark dark-text-white">Método de pago</label>
                                <select name="metodo_pago" id="metodo_pago" class="form-control" required>
                                    <option value="efectivo" {{ $pago->metodo_pago == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                                    <option value="transferencia" {{ $pago->metodo_pago == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
                                    <option value="QR" {{ $pago->metodo_pago == 'QR' ? 'selected' : '' }}>QR</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="observaciones" class="form-label fw-bold text-dark dark-text-white">Observaciones</label>
                                <textarea name="observaciones" id="observaciones" class="form-control">{{ $pago->observaciones }}</textarea>
                            </div>

                            <div id="qrSection" style="{{ ($pago->metodo_pago == 'QR' || $pago->metodo_pago == 'transferencia') ? '' : 'display:none;' }}">
                                <div class="col-md-12 text-center">
                                    <label class="form-label fw-bold text-dark dark-text-white">QR de pago (referencia)</label><br>
                                    <img src="{{ asset('assets/images/QR0994.jpg') }}" alt="QR de pago" style="max-width: 300px; margin-bottom: 20px;">
                                </div>

                                <div class="col-md-12 text-center">
                                    <label for="imagen_qr" class="form-label fw-bold text-dark dark-text-white">Imagen QR del pago (subir archivo)</label>
                                    <input type="file" name="imagen_qr" id="imagen_qr" class="form-control" accept="image/*" onchange="previewImage(event)">
                                    
                                    @if($pago->imagen_qr)
                                        <div class="mt-3">
                                            <p class="fw-bold">Imagen actual:</p>
                                            <img src="{{ asset('storage/' . $pago->imagen_qr) }}" alt="Imagen QR actual" style="max-width: 300px; border: 1px solid #ccc; padding: 5px;">
                                        </div>
                                    @endif

                                    <div class="mt-3">
                                        <img id="preview" src="#" alt="Vista previa" style="max-width: 300px; display: none; border: 1px solid #ccc; padding: 5px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-save me-2"></i> Actualizar Pago
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

<script>
document.getElementById('id_membresia').addEventListener('change', function() {
    const precio = this.options[this.selectedIndex].getAttribute('data-precio');
    document.getElementById('monto').value = precio || '';
});

document.getElementById('metodo_pago').addEventListener('change', function() {
    const qrSection = document.getElementById('qrSection');
    if (this.value === 'QR' || this.value === 'transferencia') {
        qrSection.style.display = 'block';
    } else {
        qrSection.style.display = 'none';
        document.getElementById('imagen_qr').value = '';
        document.getElementById('preview').style.display = 'none';
    }
});

function previewImage(event) {
    let preview = document.getElementById('preview');
    let file = event.target.files[0];
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.style.display = 'none';
    }
}
</script>

@endsection
