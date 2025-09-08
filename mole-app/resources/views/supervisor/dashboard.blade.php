@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido, Supervisor</h1>
    <p>Estás en el panel del Supervisor.</p>

    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger mb-3">
        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <h2 class="dashboard-title mt-4">Opciones</h2>

    <div class="dashboard-grid">

        <!-- Iniciar una nueva producción -->

        <a href="{{ route('supervisor.produccion.create') }}" class="dashboard-card">
            <i class="fas fa-cogs fa-2x"></i>
            <span>Iniciar producción</span>
        </a>

        <!-- Ver producción en proceso -->
        <a href="#" class="dashboard-card">
            <i class="fas fa-tasks"></i>
            <span>Ver producción en proceso</span>
        </a>

        <!-- Ver inventario de materias primas -->
        <a href="#" class="dashboard-card">
            <i class="fas fa-box-open"></i>
            <span>Ver inventario de materias primas</span>
        </a>

        <!-- Control de calidad -->
        <a href="#" class="dashboard-card">
            <i class="fas fa-check-circle"></i>
            <span>Control de calidad</span>
        </a>

        <!-- Ver informes de producción -->
        <a href="#" class="dashboard-card">
            <i class="fas fa-chart-line"></i>
            <span>Ver informes de producción</span>
        </a>

         <!-- Ver controles de incidencias -->
        <a href="#" class="dashboard-card">
            <i class="fas fa-chart-line"></i>
            <span>Control de incidencias</span>
        </a>


    </div>
</div>
@endsection
