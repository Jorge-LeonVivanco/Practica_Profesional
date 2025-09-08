@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Usuario</h1>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.usuarios.store') }}" method="POST">
        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" id="correo" name="correo" value="{{ old('correo') }}" required>
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <select id="rol" name="rol" required>
                    <option value="">-- Selecciona rol --</option>
                    <option value="administrador" {{ old('rol') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                    <option value="supervisor" {{ old('rol') == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                    <option value="capturista" {{ old('rol') == 'capturista' ? 'selected' : '' }}>Capturista</option>
                </select>
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>

            <div class="form-group">
                <label for="contrasena_confirmation">Confirmar Contraseña</label>
                <input type="password" id="contrasena_confirmation" name="contrasena_confirmation" required>
            </div>

            <div class="form-group">
                <label for="activo">Activo</label>
                <select id="activo" name="activo" required>
                    <option value="1" selected>Sí</option>
                    <option value="0">No</option>
                </select>
            </div>

        </div>

        <div class="text-center mt-4 d-flex justify-content-center gap-3">
            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </div>

    </form>
</div>
@endsection
