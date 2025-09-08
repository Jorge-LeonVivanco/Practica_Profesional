@extends('layouts.app')

@section('title', 'Iniciar Producción')

@section('content')
<div class="container py-4">
  <h1 class="h3 mb-4">Iniciar Producción</h1>

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

    <h4 class="mt-4">Materias Primas</h4>
    <div id="materias-container">
      @foreach($materiasPrimas as $materia)
        {{-- Asegúrate que categoria del ingrediente coincida con el tipo del select (p. ej. "Mole Poblano") --}}
        <div class="mb-2 materia-row"
             data-tipo="{{ trim($materia->ingrediente->categoria ?? '') }}"
             style="display:none;">
          <label class="form-label mb-1">{{ $materia->ingrediente->nombre ?? 'Ingrediente' }}</label>

          {{-- Si luego añades cantidad/unidad, pon los inputs aquí --}}
          <input type="hidden"
                 name="materias[{{ $materia->id_materia_prima }}][id_materia_prima]"
                 value="{{ $materia->id_materia_prima }}">
        </div>
      @endforeach
    </div>

    <div class="d-flex gap-2 mt-3">
      <button type="submit" class="btn btn-primary">Iniciar Producción</button>

      {{-- Botón de volver, estilo outline rojo (no depende de FA) --}}
      <a href="{{ route('supervisor.dashboard') }}" class="btn btn-outline-danger">
        &larr; Volver al listado
      </a>
    </div>
  </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const tipoSelect = document.getElementById('tipo_producto');
  const rows = document.querySelectorAll('.materia-row');

  // Normaliza texto (quita espacios y pasa a minúsculas)
  const norm = s => (s || '').toString().trim().toLowerCase();

  // Si en BD tienes "consome" sin acento, ajusta el mapeo aquí.
  const mapSelectToCategoria = {
    'mole poblano': 'mole poblano',
    'mole almendrado': 'mole almendrado',
    'consomé': 'consomé',      // cambia a 'consome' si así está guardado
  };

  function aplicarFiltro() {
    const elegido = norm(tipoSelect.value);
    const categoriaEsperada = mapSelectToCategoria[elegido] || elegido;

    rows.forEach(row => {
      const categoriaRow = norm(row.dataset.tipo);
      row.style.display = (categoriaRow && categoriaRow === categoriaEsperada) ? 'block' : 'none';
    });
  }

  tipoSelect.addEventListener('change', aplicarFiltro);
  aplicarFiltro(); // por si el select viene preseleccionado
});
</script>
@endsection
