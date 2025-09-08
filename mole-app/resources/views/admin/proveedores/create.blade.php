@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Proveedor</h1>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.proveedores.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="contacto">Contacto</label>
        <input type="text" name="contacto" id="contacto" required>

        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono" required>

        <label for="direccion">Dirección</label>
        <textarea name="direccion" id="direccion" required></textarea>

        <button type="submit"><i class="fas fa-save"></i> Guardar Proveedor</button>
        
        <a href="{{ route('admin.proveedores.index') }}" class="btn btn-outline-danger">
            <i class="fas fa-arrow-left"></i> Volver al listado
        </a>
    </form>
</div>
@endsection
