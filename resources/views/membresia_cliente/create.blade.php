@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="fw-bold mb-0">
                    <i class="fa-solid fa-id-card me-2"></i> Asignar Membresía a Cliente
                </h2>
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

                <form action="{{ route('membresia_cliente.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="id_cliente" class="form-label fw-bold text-dark dark-text-white">Cliente</label>
                            <select name="id_cliente" id="id_cliente" class="form-control" required>
                                <option value="">Seleccione un cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}">
                                        {{ $cliente->persona->nombre_completo ?? 'N/A' }}
                                        {{ $cliente->persona->apellido_paterno ?? '' }}
                                        {{ $cliente->persona->apellido_materno ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="id_membresia" class="form-label fw-bold text-dark dark-text-white">Membresía</label>
                            <select name="id_membresia" id="id_membresia" class="form-control" required>
                                <option value="">Seleccione una membresía</option>
                                @foreach($membresias as $membresia)
                                    <option value="{{ $membresia->id_membresia }}">
                                        {{ $membresia->tipo_membresia }} - Bs {{ number_format($membresia->precio, 2) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_inicio" class="form-label fw-bold text-dark dark-text-white">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_fin" class="form-label fw-bold text-dark dark-text-white">Fecha Fin</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="nombre_descuento" class="form-label fw-bold text-dark dark-text-white">Nombre Descuento</label>
                            <select name="nombre_descuento" id="nombre_descuento" class="form-control" required>
                                <option value="">Seleccione un descuento</option>
                                <option value="UAGRM">UAGRM</option>
                                <option value="UNIFRANZ">UNIFRANZ</option>
                                <option value="Colegio de Auditores">Colegio de Auditores</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="descuento" class="form-label fw-bold text-dark dark-text-white">Descuento (%)</label>
                            <input type="number" name="descuento" id="descuento" min="0" max="100" step="0.01" class="form-control" required>
                        </div>

                        <div class="col-md-3">
                            <label for="precio_final" class="form-label fw-bold text-dark dark-text-white">Precio Final (Bs)</label>
                            <input type="number" name="precio_final" id="precio_final" class="form-control" step="0.01" readonly required>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save me-2"></i> Guardar
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
    const nombreDescuentoSelect = document.getElementById('nombre_descuento');
    const fechaInicioInput = document.getElementById('fecha_inicio');
    const fechaFinInput = document.getElementById('fecha_fin');

    // Calcular precio final
    function calcularPrecioFinal() {
        let precio = 0;
        if (membresiaSelect.value) {
            const selectedOption = membresiaSelect.options[membresiaSelect.selectedIndex];
            let texto = selectedOption.text;
            let regex = /Bs\s?([\d,.]+)/;
            let match = texto.match(regex);
            if (match) precio = parseFloat(match[1].replace(',', ''));
        }
        let descuento = parseFloat(descuentoInput.value) || 0;
        let precioFinal = precio - (precio * (descuento / 100));
        precioFinalInput.value = precioFinal.toFixed(2);
    }

    // Auto completar descuento (20%)
    nombreDescuentoSelect.addEventListener('change', () => {
        if (nombreDescuentoSelect.value !== '') {
            descuentoInput.value = 20;
        } else {
            descuentoInput.value = '';
        }
        calcularPrecioFinal();
    });

    membresiaSelect.addEventListener('change', calcularPrecioFinal);
    descuentoInput.addEventListener('input', calcularPrecioFinal);

    // Calcular fecha fin automáticamente según tipo de membresía (ajustado)
    function calcularFechaFin() {
        const fechaInicio = new Date(fechaInicioInput.value);
        if (!fechaInicio || isNaN(fechaInicio)) return;

        const tipoMembresia = membresiaSelect.options[membresiaSelect.selectedIndex]?.text.toLowerCase();
        if (!tipoMembresia) return;

        const diaInicio = fechaInicio.getDate();
        let fechaFin = new Date(fechaInicio);

        if (tipoMembresia.includes("mensual")) {
            fechaFin.setMonth(fechaFin.getMonth() + 1);
        } else if (tipoMembresia.includes("trimestral")) {
            fechaFin.setMonth(fechaFin.getMonth() + 3);
        } else if (tipoMembresia.includes("semestral")) {
            fechaFin.setMonth(fechaFin.getMonth() + 6);
        } else if (tipoMembresia.includes("anual")) {
            fechaFin.setFullYear(fechaFin.getFullYear() + 1);
        } else {
            fechaFin.setMonth(fechaFin.getMonth() + 1);
        }

        // Mantener el mismo día del mes (o el último si no existe)
        const ultimoDiaMes = new Date(fechaFin.getFullYear(), fechaFin.getMonth() + 1, 0).getDate();
        if (diaInicio <= ultimoDiaMes) {
            fechaFin.setDate(diaInicio);
        } else {
            fechaFin.setDate(ultimoDiaMes);
        }

        const year = fechaFin.getFullYear();
        const month = String(fechaFin.getMonth() + 1).padStart(2, '0');
        const day = String(fechaFin.getDate()).padStart(2, '0');
        fechaFinInput.value = `${year}-${month}-${day}`;
    }

    fechaInicioInput.addEventListener('change', calcularFechaFin);
    membresiaSelect.addEventListener('change', calcularFechaFin);
</script>

@endsection
