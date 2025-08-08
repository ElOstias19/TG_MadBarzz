@extends('layouts.private')

@section('contenido')
<div class="row">
    <div class="col-xl-6 offset-xl-3">
        <div class="card custom-card">
            <div class="card-header">
                <h4>Editar Membresía Cliente</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('membresia_cliente.update', $membresiaCliente->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_cliente" class="form-label">Cliente</label>
                        <select name="id_cliente" id="id_cliente" class="form-control" required>
                            <option value="">Seleccione un cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id_cliente }}" {{ $membresiaCliente->id_cliente == $cliente->id_cliente ? 'selected' : '' }}>
                                    {{ $cliente->persona->nombre_completo ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_membresia" class="form-label">Membresía</label>
                        <select name="id_membresia" id="id_membresia" class="form-control" required>
                            <option value="">Seleccione una membresía</option>
                            @foreach($membresias as $membresia)
                                <option value="{{ $membresia->id_membresia }}" {{ $membresiaCliente->id_membresia == $membresia->id_membresia ? 'selected' : '' }}>
                                    {{ $membresia->tipo_membresia }} - Bs {{ number_format($membresia->precio, 2) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ $membresiaCliente->fecha_inicio }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_fin" class="form-label">Fecha Fin</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ $membresiaCliente->fecha_fin }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nombre_descuento" class="form-label">Nombre Descuento</label>
                        <select name="nombre_descuento" id="nombre_descuento" class="form-control" required>
                            <option value="">Seleccione un descuento</option>
                            <option value="UAGRM" {{ $membresiaCliente->nombre_descuento == 'UAGRM' ? 'selected' : '' }}>UAGRM</option>
                            <option value="UNIFRANZ" {{ $membresiaCliente->nombre_descuento == 'UNIFRANZ' ? 'selected' : '' }}>UNIFRANZ</option>
                            <option value="Colegio de Auditores" {{ $membresiaCliente->nombre_descuento == 'Colegio de Auditores' ? 'selected' : '' }}>Colegio de Auditores</option>
                            <!-- Más descuentos si deseas -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="descuento" class="form-label">Descuento (%)</label>
                        <input type="number" name="descuento" id="descuento" min="0" max="100" step="0.01" class="form-control" value="{{ $membresiaCliente->descuento }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="precio_final" class="form-label">Precio Final (Bs)</label>
                        <input type="number" name="precio_final" id="precio_final" step="0.01" class="form-control" value="{{ $membresiaCliente->precio_final }}" readonly required>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('membresia_cliente.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const membresiaSelect = document.getElementById('id_membresia');
    const descuentoInput = document.getElementById('descuento');
    const precioFinalInput = document.getElementById('precio_final');

    function calcularPrecioFinal() {
        let precio = 0;
        if(membresiaSelect.value){
            const selectedOption = membresiaSelect.options[membresiaSelect.selectedIndex];
            let texto = selectedOption.text;
            let regex = /Bs\s?([\d,.]+)/;
            let match = texto.match(regex);
            if(match) precio = parseFloat(match[1].replace(',', ''));
        }
        let descuento = parseFloat(descuentoInput.value) || 0;
        let precioFinal = precio - (precio * (descuento / 100));
        precioFinalInput.value = precioFinal.toFixed(2);
    }

    membresiaSelect.addEventListener('change', calcularPrecioFinal);
    descuentoInput.addEventListener('input', calcularPrecioFinal);

    // Ejecutar al cargar la página para mostrar el precio correctamente
    calcularPrecioFinal();
</script>
@endsection
