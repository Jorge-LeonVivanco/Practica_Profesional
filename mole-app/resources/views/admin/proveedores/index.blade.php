@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Proveedores</h1>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.proveedores.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Nuevo Proveedor
    </a>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Contacto</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->contacto }}</td>
                    <td>{{ $proveedor->telefono }}</td>
                    <td>{{ $proveedor->direccion }}</td>
                    <td>
                        <a href="{{ route('admin.proveedores.edit', $proveedor->id_proveedor) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.proveedores.destroy', $proveedor->id_proveedor) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-danger">
        <i class="fas fa-arrow-left"></i> Volver al Dashboard
    </a>
</div>
@endsection
