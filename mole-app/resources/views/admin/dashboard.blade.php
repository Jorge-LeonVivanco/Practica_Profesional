@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido, Administrador</h1>
    <p>Estás en el panel del Administrador.</p>

    <!-- Botón de cerrar sesión -->
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger mb-3">
        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <h2 class="dashboard-title mt-4">Opciones de Administración</h2>

    <div class="dashboard-grid">
        <!-- Gestión de usuarios -->
        <a href="{{ route('admin.usuarios.index') }}" class="dashboard-card">
            <i class="fas fa-users fa-2x"></i>
            <span>Gestión de Perfiles</span>
        </a>

        <!-- Gestión de Ingredientes -->
        <a href="{{ route('admin.ingredientes.index') }}" class="dashboard-card">
            <i class="fas fa-lemon fa-2x"></i>
            <span>Gestión de Ingredientes</span>
        </a>

        <!-- Gestión de proveedores -->
        <a href="{{ route('admin.proveedores.index') }}" class="dashboard-card">
            <i class="fas fa-truck fa-2x"></i>
            <span>Gestión de Proveedores</span>
        </a>

        <!-- Inventario materias primas -->
        <a href="{{ route('admin.materias_primas.index') }}" class="dashboard-card">
            <i class="fas fa-box-open fa-2x"></i>
            <span>Inventario de Materias Primas</span>
        </a>

        <!-- Todas las recepciones -->
        <a href="{{ route('admin.recepciones.index') }}" class="dashboard-card">
            <i class="fas fa-list fa-2x"></i>
            <span>Recepciones de Materia Prima</span>
        </a>

        <!-- Gestión productos terminados -->
        <a href="#" class="dashboard-card">
            <i class="fas fa-cogs fa-2x"></i>
            <span>Gestión de productos terminados</span>
        </a>

        <!-- Producción en proceso -->
        <a href="#" class="dashboard-card">
            <i class="fas fa-tasks fa-2x"></i>
            <span>Ver Producción en Proceso</span>
        </a>

        <!-- Control de calidad -->
        <!-- <a href="#" class="dashboard-card">
            <i class="fas fa-check-circle fa-2x"></i>
            <span>Control de calidad</span>
        </a> -->

        <!-- Generar informes -->
        <!-- <a href="#" class="dashboard-card">
            <i class="fas fa-chart-line fa-2x"></i>
            <span>Generar informes</span>
        </a> -->

        <!-- Trazabilidad de producción -->
        <!-- <a href="#" class="dashboard-card">
            <i class="fas fa-history fa-2x"></i>
            <span>Ver trazabilidad de producción</span>
        </a> -->

    </div>
</div>
@endsection
