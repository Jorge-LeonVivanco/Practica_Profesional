@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido, Capturista</h1>
    <p>Estás en el panel del Capturista.</p>

    <!-- Botón de cerrar sesión -->
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger mb-3">
        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <h2 class="dashboard-title mt-4">Opciones</h2>

    <div class="dashboard-grid">
        
        <a href="{{ route('capturista.recepciones.create') }}" class="dashboard-card">
            <i class="fas fa-plus-circle fa-2x"></i>
            <span>Registrar Nueva Recepción</span>
        </a>

        <a href="{{ route('capturista.materias_primas.index') }}" class="dashboard-card">
            <i class="fas fa-box-open fa-2x"></i>
            <span>Inventario de Materias Primas</span>
        </a>

        <a href="{{ route('capturista.recepciones.index') }}" class="dashboard-card">
            <i class="fas fa-list fa-2x"></i>
            <span>Historial de Recepciones</span>
        </a>


        <a href="#" class="dashboard-card">
            <i class="fas fa-undo fa-2x"></i>
            <span>Registrar Devoluciones</span>
        </a>


    </div>
</div>
@endsection
