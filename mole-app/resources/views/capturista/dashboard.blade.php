@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bienvenido, Capturista</h1>
        <p>Estás en el panel del Capturista.</p>
        <a href="{{ url('/logout') }}" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>

        <div class="options">
            <h2>Opciones</h2>
            <ul class="options-list">
                <li>
                    <a href="{{ route('capturista.recepciones.create') }}" class="option-link">
                        <i class="fas fa-plus-circle"></i> Registrar nueva recepción de materias primas
                    </a>
                </li>
                <li>
                    <a href="{{ route('capturista.recepciones.index') }}" class="option-link">
                        <i class="fas fa-box-open"></i> Ver recepciones de materias primas
                    </a>
                </li>
                <li>
                    <a href="{{ route('capturista.materias_primas.index') }}" class="option-link">
                        <i class="fas fa-list"></i> Ver cantidades totales
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
