@extends('layouts.private')

@section('contenido')
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title fs-24 fw-bold text-dark dark-text-white">
                    <h2 class="fw-bold mb-4">Editar Pago</h2>
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
                            <label class="form-label fw-bold text-dark dark-text-white">Cliente</label>
                            <select name="id_cliente" id="id_cliente" class="form-control" required>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}" {{ $pago->id_cliente == $cliente->id_cliente ? 'selected' : '' }}>
                                        {{ $cliente->persona->nombre_completo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Membresía</label>
                            <select name="id_membresia" id="id_membresia" class="form-control" required>
                                @foreach($membresias as $membresia)
                                    <option value="{{ $membresia->id_membresia }}" {{ $pago->id_membresia == $membresia->id_membresia ? 'selected' : '' }}
                                        data-precio="{{ $membresia->precio }}">
                                        {{ $membresia->tipo_membresia }} - Bs. {{ number_format($membresia->precio, 2) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Monto</label>
                            <input type="number" step="0.01" name="monto" id="monto" class="form-control" value="{{ $pago->monto }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Fecha de pago</label>
                            <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" value="{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('Y-m-d') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark dark-text-white">Método de pago</label>
                            <select name="metodo_pago" id="metodo_pago" class="form-control" required>
                                <option value="efectivo" {{ $pago->metodo_pago == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                                <option value="transferencia" {{ $pago->metodo_pago == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
                                <option value="QR" {{ $pago->metodo_pago == 'QR' ? 'selected' : '' }}>QR</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-bold text-dark dark-text-white">Observaciones</label>
                            <textarea name="observaciones" class="form-control">{{ $pago->observaciones }}</textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <label class="form-label fw-bold text-dark dark-text-white">QR de pago actual</label><br>
                            @if($pago->imagen_qr)
                                <img src="{{ asset('storage/' . $pago->imagen_qr) }}" width="200" class="mb-2" alt="QR pago registrado">
                            @else
                                <p>No hay QR registrado.</p>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-bold text-dark dark-text-white">Cambiar imagen QR del pago</label>
                            <input type="file" name="imagen_qr" id="imagen_qr" class="form-control" accept="image/*" onchange="previewImage(event)">
                            <small class="text-muted">Si no seleccionas una nueva imagen, se mantendrá la actual.</small>
                            <div class="mt-3 text-center">
                                <img id="preview" src="#" alt="Vista previa" style="max-width: 300px; display: none; border: 1px solid #ccc; padding: 5px; border-radius: 8px;">
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
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

<script>
document.getElementById('id_membresia').addEventListener('change', function() {
    const precio = this.options[this.selectedIndex].getAttribute('data-precio');
    const montoInput = document.getElementById('monto');
    montoInput.value = precio || '';
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
