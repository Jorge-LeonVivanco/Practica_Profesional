@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Ingredientes</h1>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.ingredientes.create') }}" class="btn btn-primary mb-3">+ Nuevo Ingrediente</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Unidad de Medida</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ingredientes as $ingrediente)
            <tr>
                <td>{{ $ingrediente->id_ingrediente }}</td>
                <td>{{ $ingrediente->nombre }}</td>
                <td>{{ $ingrediente->unidad_medida }}</td>
                <td>{{ $ingrediente->activo ? 'Sí' : 'No' }}</td>
                <td>
                    <a href="{{ route('admin.ingredientes.edit', $ingrediente->id_ingrediente) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('admin.ingredientes.destroy', $ingrediente->id_ingrediente) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar ingrediente?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-danger">
        <i class="fas fa-arrow-left"></i> Regresar al Dashboard
    </a>

</div>
@endsection
