@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>

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

    <form action="{{ route('admin.usuarios.update', $user->id_usuario) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $user->nombre) }}" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" id="correo" name="correo" value="{{ old('correo', $user->correo) }}" required>
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <select id="rol" name="rol" required>
                    <option value="">-- Selecciona rol --</option>
                    <option value="administrador" {{ $user->rol == 'administrador' ? 'selected' : '' }}>Administrador</option>
                    <option value="supervisor" {{ $user->rol == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                    <option value="capturista" {{ $user->rol == 'capturista' ? 'selected' : '' }}>Capturista</option>
                </select>
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña (dejar vacío si no quieres cambiarla)</label>
                <input type="password" id="contrasena" name="contrasena">
            </div>

            <div class="form-group">
                <label for="contrasena_confirmation">Confirmar Contraseña</label>
                <input type="password" id="contrasena_confirmation" name="contrasena_confirmation">
            </div>

            <div class="form-group">
                <label for="activo">Activo</label>
                <select id="activo" name="activo" required>
                    <option value="1" {{ $user->activo ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ !$user->activo ? 'selected' : '' }}>No</option>
                </select>
            </div>

        </div>

        <div class="text-center mt-4 d-flex justify-content-center gap-3">
            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </div>

    </form>
</div>
@endsection
