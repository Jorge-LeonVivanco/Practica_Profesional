@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Proveedor</h1>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.proveedores.update', $proveedor->id_proveedor) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ $proveedor->nombre }}" required>

        <label for="contacto">Contacto</label>
        <input type="text" name="contacto" id="contacto" value="{{ $proveedor->contacto }}" required>

        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono" value="{{ $proveedor->telefono }}" required>

        <label for="direccion">Dirección</label>
        <textarea name="direccion" id="direccion" required>{{ $proveedor->direccion }}</textarea>

        <button type="submit"><i class="fas fa-save"></i> Actualizar Proveedor</button>
    </form>
</div>
@endsection
