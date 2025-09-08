@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Inventario de Materias Primas</h1>

    <!-- Botón para volver al dashboard -->
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-danger mb-3">
        <i class="fas fa-arrow-left"></i> Volver al Dashboard
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>Ingrediente</th>
                <th>Unidad de Medida</th>
                <th>Cantidad Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materiasPrimas as $materia)
                <tr>
                    <td>{{ $materia->nombre_ingrediente }}</td>
                    <td>{{ $materia->unidad_medida }}</td>
                    <td>{{ $materia->cantidad_total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
