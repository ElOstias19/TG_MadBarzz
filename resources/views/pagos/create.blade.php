@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Registrar Pago</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pagos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="id_cliente">Cliente</label>
            <select name="id_cliente" id="id_cliente" class="form-control" required>
                <option value="">Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}">
                        {{ $cliente->persona->nombre_completo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_membresia">Membresía</label>
            <select name="id_membresia" id="id_membresia" class="form-control" required>
                <option value="">Seleccione una membresía</option>
                @foreach($membresias as $membresia)
                    <option 
                        value="{{ $membresia->id_membresia }}" 
                        data-precio="{{ $membresia->precio }}"
                    >
                        {{ $membresia->tipo_membresia }} - Bs. {{ number_format($membresia->precio, 2) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="monto">Monto</label>
            <input type="number" step="0.01" name="monto" id="monto" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fecha_pago">Fecha de pago</label>
            <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="metodo_pago">Método de pago</label>
            <select name="metodo_pago" id="metodo_pago" class="form-control" required>
                <option value="efectivo">Efectivo</option>
                <option value="transferencia">Transferencia</option>
                <option value="QR">QR</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" id="observaciones" class="form-control"></textarea>
        </div>

        <div class="mb-3 text-center">
            <label>QR de pago (referencia)</label><br>
            <img src="{{ asset('assets/images/QR0994.jpg') }}" alt="QR de pago" style="max-width: 300px; margin-bottom: 20px;">
        </div>

        <div class="mb-3 text-center">
            <label for="imagen_qr" class="form-label">Imagen QR del pago (subir archivo)</label>
            <input type="file" name="imagen_qr" id="imagen_qr" class="form-control" accept="image/*" onchange="previewImage(event)">
            <div class="mt-3">
                <img id="preview" src="#" alt="Vista previa" style="max-width: 300px; display: none; border: 1px solid #ccc; padding: 5px;">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Guardar Pago</button>
    </form>
</div>

<script>
document.getElementById('id_membresia').addEventListener('change', function() {
    const precio = this.options[this.selectedIndex].getAttribute('data-precio');
    const montoInput = document.getElementById('monto');
    if(precio){
        montoInput.value = precio;
    } else {
        montoInput.value = '';
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
