@extends('layouts.app')

@section('title', 'Iniciar Producción')

@section('content')
<div class="container">
    <h1>Iniciar Producción</h1>

    <form action="{{ route('supervisor.produccion.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="tipo_producto" class="form-label">Tipo de Producto</label>
            <select name="tipo_producto" id="tipo_producto" class="form-select" required>
                <option value="">-- Selecciona --</option>
                <option value="Mole Poblano">Mole Poblano</option>
                <option value="Mole Almendrado">Mole Almendrado</option>
                <option value="Consomé">Consomé</option>
            </select>
        </div>

        <h4>Materias Primas</h4>
        <div id="materias-container">
            @foreach($materiasPrimas as $materia)
            <div class="mb-2 materia-row" data-tipo="{{ $materia->ingrediente->categoria ?? '' }}" style="display: none;">
                <label>{{ $materia->ingrediente->nombre ?? 'Ingrediente' }}</label>
                <input type="hidden" name="materias[{{ $materia->id_materia_prima }}][id_materia_prima]" value="{{ $materia->id_materia_prima }}">
            </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary mt-3">Iniciar Producción</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tipoSelect = document.getElementById('tipo_producto');
    const rows = document.querySelectorAll('.materia-row');

    tipoSelect.addEventListener('change', function() {
        const tipo = this.value;

        rows.forEach(row => {
            if(row.dataset.tipo === tipo) {
                row.style.display = 'block';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
</script>
@endsection
