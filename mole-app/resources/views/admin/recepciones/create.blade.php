@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1140px; padding: 1.5rem;">
    <h2 class="text-center mb-3">Nueva Recepción</h2>

    <form action="{{ route('capturista.recepciones.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3">

            <!-- Selección de Proveedor -->
            <div class="col-md-4">
                <label for="id_proveedor" class="form-label">Proveedor</label>
                <select name="id_proveedor" id="id_proveedor" class="form-select form-select-sm">
                    <option value="">-- Selecciona proveedor --</option>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Selección de Ingrediente -->
            <div class="col-md-4">
                <label for="id_ingrediente" class="form-label">Ingrediente</label>
                <select name="id_ingrediente" id="id_ingrediente" class="form-select form-select-sm" required>
                    <option value="">-- Selecciona ingrediente --</option>
                    @foreach($ingredientes as $ingrediente)
                        <option value="{{ $ingrediente->id_ingrediente }}" data-unidad="{{ $ingrediente->unidad_medida }}">
                            {{ $ingrediente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Unidad de Medida autocompletada -->
            <div class="col-md-4">
                <label class="form-label">Unidad de Medida</label>
                <input type="text" id="unidad_medida" name="unidad_medida" class="form-control form-control-sm" readonly required>
            </div>

            <!-- Cantidad Recibida -->
            <div class="col-md-4">
                <label class="form-label">Cantidad Recibida</label>
                <input type="number" name="cantidad_recibida" step="0.01" class="form-control form-control-sm" required>
            </div>

            <!-- Fecha de Recepción -->
            <div class="col-md-4">
                <label class="form-label">Fecha de Recepción</label>
                <input type="date" name="fecha_recepcion" class="form-control form-control-sm" required>
            </div>

            <!-- Fecha de Ingreso -->
            <div class="col-md-4">
                <label class="form-label">Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" class="form-control form-control-sm" required>
            </div>

            <!-- Fecha de Vencimiento -->
            <div class="col-md-4">
                <label class="form-label">Fecha de Vencimiento</label>
                <input type="date" name="fecha_vencimiento" class="form-control form-control-sm">
            </div>

            <!-- Lote del Proveedor -->
            <div class="col-md-4">
                <label class="form-label">Lote del Proveedor</label>
                <input type="text" name="lote_proveedor" class="form-control form-control-sm">
            </div>

            <!-- Evaluado Por -->
            <div class="col-md-4">
                <label class="form-label">Evaluado Por</label>
                <input type="text" name="evaluado_por" class="form-control form-control-sm">
            </div>

            <!-- Ubicación Estante -->
            <div class="col-md-4">
                <label class="form-label">Ubicación Estante</label>
                <input type="text" name="ubicacion_estante" class="form-control form-control-sm">
            </div>

            <!-- Temperatura Recomendada -->
            <div class="col-md-4">
                <label class="form-label">Temperatura Recomendada (°C)</label>
                <input type="number" name="temperatura_recomendada" class="form-control form-control-sm" step="0.1">
            </div>

            <!-- Estado -->
            <div class="col-md-4">
                <label class="form-label">Estado</label>
                <select name="estado" class="form-select form-select-sm">
                    <option value="">-- Selecciona --</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Aceptado">Aceptado</option>
                    <option value="Rechazado">Rechazado</option>
                    <option value="En evaluación">En evaluación</option>
                    <option value="No conforme">No conforme</option>
                </select>
            </div>

            <!-- Certificado de Calidad -->
            <div class="col-md-4">
                <label class="form-label">Certificado de Calidad (PDF o imagen)</label>
                <input class="form-control form-control-sm" type="file" name="certificado_calidad" accept=".pdf,.jpg,.jpeg,.png">
            </div>

            <!-- Resultado Evaluación -->
            <div class="col-md-12">
                <label class="
                <label class="form-label">Resultado Evaluación</label>
                <textarea name="resultado_evaluacion" class="form-control form-control-sm" rows="2"></textarea>
            </div>

            <!-- Observaciones -->
            <div class="col-md-12">
                <label class="form-label">Observaciones</label>
                <textarea name="observaciones" class="form-control form-control-sm" rows="2"></textarea>
            </div>
        </div>

        <!-- Botones -->
        <div class="text-center mt-4 d-flex justify-content-center gap-3">
            <a href="{{ route('capturista.recepciones.index') }}" class="btn btn-outline-danger btn-sm px-4">Cancelar</a>
            <button type="submit" class="btn btn-primary btn-sm px-4">Guardar</button>
        </div>
    </form>
</div>

<!-- ===========================
     SCRIPT PARA AUTOCOMPLETAR UNIDAD
=========================== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ingredienteSelect = document.getElementById('id_ingrediente');
    const unidadInput = document.getElementById('unidad_medida');

    ingredienteSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const unidad = selectedOption.getAttribute('data-unidad') || '';
        unidadInput.value = unidad;
    });
});
</script>
@endsection
