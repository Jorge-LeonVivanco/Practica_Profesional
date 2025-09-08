@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Recepciones de Materias Primas</h1>

    <!-- Botón para volver al dashboard -->
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-danger mb-3">
        <i class="fas fa-arrow-left"></i> Volver al Dashboard
    </a>



    <table class="table table-striped">
        <thead>
            <tr>
                <th>Ingrediente</th>
                <th>Cantidad Recibida</th>
                <th>Fecha de Recepción</th>
                <th>Evaluado por</th>
                <th>Resultado Evaluación</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recepciones as $recepcion)
            <tr>
                <td>{{ $recepcion->materiaPrima->ingrediente->nombre ?? '-' }}</td>
                <td>{{ $recepcion->cantidad_recibida }}</td>
                <td>{{ $recepcion->fecha_recepcion }}</td>
                <td>{{ $recepcion->evaluado_por }}</td>
                <td>{{ $recepcion->resultado_evaluacion }}</td>
                <td>{{ $recepcion->observaciones }}</td>
                <td>
                    <a href="{{ route('admin.recepciones.edit', $recepcion->id_recepcion) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('admin.recepciones.destroy', $recepcion->id_recepcion) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta recepción?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
