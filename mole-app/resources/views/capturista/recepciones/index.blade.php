@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Listado de Recepciones de Materias Primas</h1>

        <!-- Botón para regresar al Dashboard -->
        <a href="{{ route('capturista.dashboard') }}">
            <button type="button">Volver al Dashboard</button>
        </a>

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <a href="{{ route('capturista.recepciones.create') }}">Registrar nueva recepción</a>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad Inicial</th>
                    <!-- <th>Proveedor</th> -->
                    <th>Fecha de Ingreso</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Unidad de Medida</th>
                    <th>Lote del Proveedor</th>
                    <th>Estado</th>
                    <th>Temperatura Recomendada</th>
                    <th>Ubicación Estante</th>
                    <th>Certificado de Calidad</th>
                    <th>Fecha Última Revisión</th>
                </tr>
            </thead>
            <tbody>
            @foreach($recepciones as $recepcion)
                <tr>
                    <td>{{ $recepcion->materiaPrima->ingrediente->nombre ?? '-' }}</td>
                    <td>{{ $recepcion->observaciones }}</td>
                    <td>{{ $recepcion->cantidad_recibida }}</td>
                    <!-- <td>{{ $recepcion->materiaPrima->proveedor->nombre ?? 'Sin proveedor' }}</td> -->
                    <td>{{ $recepcion->fecha_ingreso }}</td>
                    <td>{{ $recepcion->fecha_vencimiento }}</td>
                    <td>{{ $recepcion->unidad_medida }}</td>
                    <td>{{ $recepcion->lote_proveedor }}</td>
                    <td>{{ $recepcion->estado }}</td>
                    <td>{{ $recepcion->temperatura_recomendada }}</td>
                    <td>{{ $recepcion->ubicacion_estante }}</td>
                    <td>{{ $recepcion->certificado_calidad ? 'Sí' : 'No' }}</td>
                    <td>{{ $recepcion->fecha_recepcion }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
