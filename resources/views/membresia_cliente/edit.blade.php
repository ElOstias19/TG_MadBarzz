@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title fs-24 fw-bold text-dark dark-text-white">
                    <h2 class="fw-bold mb-4">Editar Membresía Cliente</h2>
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

                <form action="{{ route('membresia_cliente.update', $membresiaCliente->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <h4 class="dark-text-white mt-3">Datos de la Membresía Cliente</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="id_cliente" class="form-label fw-bold text-dark dark-text-white">Cliente</label>
                            <select name="id_cliente" id="id_cliente" class="form-control" required>
                                <option value="">Seleccione un cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}" {{ $membresiaCliente->id_cliente == $cliente->id_cliente ? 'selected' : '' }}>
                                        {{ $cliente->persona->nombre_completo ?? 'N/A' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="id_membresia" class="form-label fw-bold text-dark dark-text-white">Membresía</label>
                            <select name="id_membresia" id="id_membresia" class="form-control" required>
                                <option value="">Seleccione una membresía</option>
                                @foreach($membresias as $membresia)
                                    <option value="{{ $membresia->id_membresia }}" {{ $membresiaCliente->id_membresia == $membresia->id_membresia ? 'selected' : '' }}>
                                        {{ $membresia->tipo_membresia }} - Bs {{ number_format($membresia->precio, 2) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_inicio" class="form-label fw-bold text-dark dark-text-white">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ $membresiaCliente->fecha_inicio }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_fin" class="form-label fw-bold text-dark dark-text-white">Fecha Fin</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ $membresiaCliente->fecha_fin }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="nombre_descuento" class="form-label fw-bold text-dark dark-text-white">Nombre Descuento</label>
                            <select name="nombre_descuento" id="nombre_descuento" class="form-control" required>
                                <option value="">Seleccione un descuento</option>
                                <option value="UAGRM" {{ $membresiaCliente->nombre_descuento == 'UAGRM' ? 'selected' : '' }}>UAGRM</option>
                                <option value="UNIFRANZ" {{ $membresiaCliente->nombre_descuento == 'UNIFRANZ' ? 'selected' : '' }}>UNIFRANZ</option>
                                <option value="Colegio de Auditores" {{ $membresiaCliente->nombre_descuento == 'Colegio de Auditores' ? 'selected' : '' }}>Colegio de Auditores</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="descuento" class="form-label fw-bold text-dark dark-text-white">Descuento (%)</label>
                            <input type="number" name="descuento" id="descuento" min="0" max="100" step="0.01" class="form-control" value="{{ $membresiaCliente->descuento }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="precio_final" class="form-label fw-bold text-dark dark-text-white">Precio Final (Bs)</label>
                            <input type="number" name="precio_final" id="precio_final" step="0.01" class="form-control" value="{{ $membresiaCliente->precio_final }}" readonly required>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save me-2"></i> Actualizar
                        </button>
                        <a href="{{ route('membresia_cliente.index') }}" class="btn btn-secondary ms-2">
                            Cancelar
                        </a>
                    </div>

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
            let regex = /Bs\s?([\d,.]+)/;
            let match = selectedOption.text.match(regex);
            if(match) precio = parseFloat(match[1].replace(',', ''));
        }
        let descuento = parseFloat(descuentoInput.value) || 0;
        let precioFinal = precio - (precio * (descuento / 100));
        precioFinalInput.value = precioFinal.toFixed(2);
    }

    membresiaSelect.addEventListener('change', calcularPrecioFinal);
    descuentoInput.addEventListener('input', calcularPrecioFinal);

    calcularPrecioFinal();
</script>

@endsection
