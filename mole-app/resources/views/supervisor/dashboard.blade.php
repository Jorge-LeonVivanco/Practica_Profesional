@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bienvenido, Supervisor</h1>
        <p>Estás en el panel del Supervisor.</p>
        <a href="{{ url('/logout') }}" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>

        <div class="options">
            <h2>Opciones</h2>
            <ul class="options-list">
                <!-- Opción 1: Ver inventario de materias primas -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-box-open"></i> Ver inventario de materias primas
                    </a>
                </li>
                <!-- Opción 2: Ver todas las recepciones -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-list"></i> Ver todas las recepciones
                    </a>
                </li>
                <!-- Opción 3: Iniciar una nueva producción -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-cogs"></i> Iniciar producción
                    </a>
                </li>
                <!-- Opción 4: Control de calidad -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-check-circle"></i> Control de calidad
                    </a>
                </li>
                <!-- Opción 5: Ver producción en proceso -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-tasks"></i> Ver producción en proceso
                    </a>
                </li>
                <!-- Opción 6: Ver informes de producción -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-chart-line"></i> Ver informes de producción
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
