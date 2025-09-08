@extends('layouts.app')

@section('title', 'Listado de Recepciones')

@section('content')
<div class="container">
    <h1>Listado de Recepciones de Materias Primas</h1>

    <!-- Botón para regresar al Dashboard -->

    <a href="{{ route('capturista.dashboard') }}" class="btn btn-outline-danger">
            <i class="fas fa-arrow-left"></i>Volver al Dashboard
    </a>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <!-- Botón para registrar nueva recepción -->
    <a href="{{ route('capturista.recepciones.create') }}" class="btn btn-primary mb-3">
        + Registrar nueva recepción
    </a>

    <!-- Contenedor responsive de tabla -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Ingrediente</th>
                    <th>Proveedor</th>
                    <th>Fecha de Recepción</th>
                    <th>Fecha de Ingreso</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Cantidad Recibida</th>
                    <th>Unidad de Medida</th>
                    <th>Lote del Proveedor</th>
                    <th>Estado</th>
                    <th>Evaluado Por</th>
                    <th>Temperatura Recomendada</th>
                    <th>Ubicación Estante</th>
                    <th>Certificado de Calidad</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recepciones as $recepcion)
                    <tr>
                        <td>{{ $recepcion->materiaPrima->ingrediente->nombre ?? '-' }}</td>
                        <td>{{ optional($recepcion->proveedor)->nombre ?? 'Sin proveedor' }}</td>
                        <td>{{ $recepcion->fecha_recepcion ?? '-' }}</td>
                        <td>{{ $recepcion->fecha_ingreso_inventario ?? '-' }}</td>
                        <td>{{ $recepcion->fecha_vencimiento ?? '-' }}</td>
                        <td>{{ $recepcion->cantidad_recibida ?? 0 }}</td>
                        <td>{{ $recepcion->unidad_medida ?? '-' }}</td>
                        <td>{{ $recepcion->lote_proveedor ?? '-' }}</td>
                        <td>{{ $recepcion->estado ?? '-' }}</td>
                        <td>{{ $recepcion->evaluado_por ?? '-' }}</td>
                        <td>{{ $recepcion->temperatura_recomendada ?? '-' }}</td>
                        <td>{{ $recepcion->ubicacion_estante ?? '-' }}</td>
                        <td>{{ $recepcion->certificado_calidad ? 'Sí' : 'No' }}</td>
                        <td>{{ $recepcion->observaciones ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="14" class="text-center">No hay recepciones registradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
