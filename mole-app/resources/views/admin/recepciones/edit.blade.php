@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Recepción</h1>

    <!-- Botón para volver al índice -->
    <a href="{{ route('admin.recepciones.index') }}" class="btn btn-outline-danger mb-3">
        ← Volver al listado
    </a>

    <form action="{{ route('admin.recepciones.update', $recepcion->id_recepcion) }}" method="POST">
        @csrf
        @method('PUT')

            <!-- Selección de Ingrediente -->
            <div class="col-md-4">
                <label for="id_ingrediente" class="form-label">Ingrediente</label>
                <select name="id_ingrediente" id="id_ingrediente" class="form-select form-select-sm" required>
                    <option value="">-- Selecciona ingrediente --</option>
                    @foreach(App\Models\Ingrediente::all() as $ingrediente)
                        <option 
                            value="{{ $ingrediente->id_ingrediente }}"
                            data-unidad="{{ $ingrediente->unidad_medida }}"
                            data-proveedor="{{ $ingrediente->id_proveedor }}"
                        >
                            {{ $ingrediente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

        <div class="form-group">
            <label for="cantidad_recibida">Cantidad Recibida</label>
            <input type="number" name="cantidad_recibida" id="cantidad_recibida" class="form-control"
                value="{{ $recepcion->cantidad_recibida }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="fecha_recepcion">Fecha de Recepción</label>
            <input type="date" name="fecha_recepcion" id="fecha_recepcion" class="form-control"
                value="{{ $recepcion->fecha_recepcion }}" required>
        </div>

        <div class="form-group">
            <label for="evaluado_por">Evaluado por</label>
            <input type="text" name="evaluado_por" id="evaluado_por" class="form-control"
                value="{{ $recepcion->evaluado_por }}">
        </div>

        <div class="form-group">
            <label for="resultado_evaluacion">Resultado Evaluación</label>
            <input type="text" name="resultado_evaluacion" id="resultado_evaluacion" class="form-control"
                value="{{ $recepcion->resultado_evaluacion }}">
        </div>

        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" id="observaciones" class="form-control">{{ $recepcion->observaciones }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Recepción</button>
    </form>
</div>
@endsection
