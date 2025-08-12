@extends('layouts.app')

@section('title', 'Nueva Recepción')

@section('content')
<div class="container" style="max-width: 1140px; padding: 1.5rem;">
    <h2 class="text-center mb-3">Nueva Recepción</h2>

    <form action="{{ route('capturista.recepciones.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3">
            <div class="col-md-4">
                <label for="id_ingrediente" class="form-label">Ingrediente</label>
                <select name="id_ingrediente" class="form-select form-select-sm" required>
                    <option value="">-- Selecciona --</option>
                    @foreach(App\Models\Ingrediente::all() as $ingrediente)
                        <option value="{{ $ingrediente->id_ingrediente }}">{{ $ingrediente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Cantidad Recibida</label>
                <input type="number" name="cantidad_recibida" step="0.01" class="form-control form-control-sm" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Unidad de Medida</label>
                <select name="unidad_medida" class="form-select form-select-sm" required>
                    <option value="">-- Selecciona --</option>
                    <option value="kg">kg</option>
                    <option value="g">g</option>
                    <option value="mg">mg</option>
                    <option value="L">L</option>
                    <option value="ml">ml</option>
                    <option value="gal">gal</option>
                    <option value="pieza">pieza</option>
                    <option value="unidad">unidad</option>
                    <option value="docena">docena</option>
                    <option value="paquete">paquete</option>
                    <option value="saco">saco</option>
                    <option value="bulto">bulto</option>
                    <option value="frasco">frasco</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Fecha de Recepción</label>
                <input type="date" name="fecha_recepcion" class="form-control form-control-sm" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" class="form-control form-control-sm" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Fecha de Vencimiento</label>
                <input type="date" name="fecha_vencimiento" class="form-control form-control-sm">
            </div>

            <div class="col-md-4">
                <label class="form-label">Lote del Proveedor</label>
                <input type="text" name="lote_proveedor" class="form-control form-control-sm" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Evaluado Por</label>
                <input type="text" name="evaluado_por" class="form-control form-control-sm">
            </div>

            <div class="col-md-4">
                <label class="form-label">Ubicación Estante</label>
                <input type="text" name="ubicacion_estante" class="form-control form-control-sm">
            </div>

            <div class="col-md-4">
                <label class="form-label">Temperatura Recomendada (°C)</label>
                <input type="number" name="temperatura_recomendada" class="form-control form-control-sm" step="0.1">
            </div>

            <div class="col-md-4">
                <label class="form-label">Estado</label>
                <select name="estado" class="form-select form-select-sm" required>
                    <option value="">-- Selecciona --</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Aceptado">Aceptado</option>
                    <option value="Rechazado">Rechazado</option>
                    <option value="En evaluación">En evaluación</option>
                    <option value="No conforme">No conforme</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Certificado de Calidad (PDF o imagen)</label>
                <input class="form-control form-control-sm" type="file" name="certificado_calidad" accept=".pdf, .jpg, .jpeg, .png">
            </div>

            <div class="col-md-12">
                <label class="form-label">Resultado Evaluación</label>
                <textarea name="resultado_evaluacion" class="form-control form-control-sm" rows="2"></textarea>
            </div>

            <div class="col-md-12">
                <label class="form-label">Observaciones</label>
                <textarea name="observaciones" class="form-control form-control-sm" rows="2"></textarea>
            </div>
        </div>

        <div class="text-center mt-4 d-flex justify-content-center gap-3">
            <a href="{{ route('capturista.dashboard') }}" class="btn btn-outline-danger btn-sm px-4">Cancelar</a>
            <button type="submit" class="btn btn-custom btn-sm px-4">Guardar</button>
        </div>
    </form>
</div>
@endsection
