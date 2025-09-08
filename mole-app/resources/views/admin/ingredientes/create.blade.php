@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Ingrediente</h1>

    <a href="{{ route('admin.ingredientes.index') }}" class="btn btn-outline-danger">
        <i class="fas fa-arrow-left"></i> ← Volver al listado
    </a>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.ingredientes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

    <div class="form-group">
        <label>Unidad de Medida:</label>
        <select name="unidad_medida" class="form-control" required>
            <option value="">-- Selecciona --</option>
            <option value="kg" {{ (isset($ingrediente) && $ingrediente->unidad_medida == 'kg') ? 'selected' : '' }}>kg</option>
            <option value="g" {{ (isset($ingrediente) && $ingrediente->unidad_medida == 'g') ? 'selected' : '' }}>g</option>
            <option value="mg" {{ (isset($ingrediente) && $ingrediente->unidad_medida == 'mg') ? 'selected' : '' }}>mg</option>
            <option value="L" {{ (isset($ingrediente) && $ingrediente->unidad_medida == 'L') ? 'selected' : '' }}>L</option>
            <option value="ml" {{ (isset($ingrediente) && $ingrediente->unidad_medida == 'ml') ? 'selected' : '' }}>ml</option>
            <option value="gal" {{ (isset($ingrediente) && $ingrediente->unidad_medida == 'gal') ? 'selected' : '' }}>gal</option>
            <option value="pieza" {{ (isset($ingrediente) && $ingrediente->unidad_medida == 'pieza') ? 'selected' : '' }}>pieza</option>
            <option value="unidad" {{ (isset($ingrediente) && $ingrediente->unidad_medida == 'unidad') ? 'selected' : '' }}>unidad</option>
            <option value="docena" {{ (isset($ingrediente) && $ingrediente->unidad_medida == 'docena') ? 'selected' : '' }}>docena</option>            <option value="saco" {{ (isset($ingrediente) && $ingrediente->unidad_medida == 'saco') ? 'selected' : '' }}>saco</option>
            <option value="bulto" {{ (isset($ingrediente) && $ingrediente->unidad_medida == 'bulto') ? 'selected' : '' }}>bulto</option>
        </select>
    </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
@endsection
