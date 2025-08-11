@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Editar Pago</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pagos.update', $pago->id_pago) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_cliente">Cliente</label>
            <select name="id_cliente" id="id_cliente" class="form-control" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}" {{ $pago->id_cliente == $cliente->id_cliente ? 'selected' : '' }}>
                        {{ $cliente->persona->nombre_completo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_membresia">Membresía</label>
            <select name="id_membresia" id="id_membresia" class="form-control" required>
                @foreach($membresias as $membresia)
                    <option value="{{ $membresia->id_membresia }}" {{ $pago->id_membresia == $membresia->id_membresia ? 'selected' : '' }}>
                        {{ $membresia->tipo_membresia }} - Bs. {{ number_format($membresia->precio, 2) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="monto">Monto</label>
            <input type="number" step="0.01" name="monto" id="monto" class="form-control" value="{{ $pago->monto }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_pago">Fecha de pago</label>
            <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" value="{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="metodo_pago">Método de pago</label>
            <select name="metodo_pago" id="metodo_pago" class="form-control" required>
                <option value="efectivo" {{ $pago->metodo_pago == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                <option value="transferencia" {{ $pago->metodo_pago == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
                <option value="QR" {{ $pago->metodo_pago == 'QR' ? 'selected' : '' }}>QR</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" id="observaciones" class="form-control">{{ $pago->observaciones }}</textarea>
        </div>

        <div class="mb-3 text-center">
            <label>QR de pago (referencia)</label><br>
            <img src="{{ asset('assets/images/QR0994.jpg') }}" alt="QR de pago" style="max-width: 300px; margin-bottom: 20px;">
        </div>


        <div class="mb-3">
            <label>Imagen QR actual del pago</label><br>
            @if($pago->imagen_qr)
                <img src="{{ asset('storage/qrs/' . $pago->imagen_qr) }}" width="200" class="mb-2" alt="QR pago registrado">
            @else
                <p>No hay QR registrado.</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="imagen_qr">Cambiar imagen QR del pago</label>
            <input type="file" name="imagen_qr" id="imagen_qr" class="form-control" accept="image/*" onchange="previewImage(event)">
            <small class="text-muted">Si no seleccionas una nueva imagen, se mantendrá la actual.</small>
            <div class="mt-3">
                <img id="preview" src="#" alt="Vista previa" style="max-width: 300px; display: none; border: 1px solid #ccc; padding: 5px;">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Pago</button>
    </form>
</div>

<script>
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
