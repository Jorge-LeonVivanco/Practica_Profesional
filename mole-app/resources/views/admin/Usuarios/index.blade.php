@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Usuarios</h1>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle"></i> Nuevo Usuario
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id_usuario }}</td>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->correo }}</td>
                <td>{{ ucfirst($user->rol) }}</td>
                <td>{{ $user->activo ? 'Sí' : 'No' }}</td>
                <td>
                    <a href="{{ route('admin.usuarios.edit', $user->id_usuario) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('admin.usuarios.destroy', $user->id_usuario) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
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
