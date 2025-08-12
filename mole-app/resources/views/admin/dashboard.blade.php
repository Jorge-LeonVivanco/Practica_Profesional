@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bienvenido, Administrador</h1>
        <p>Estás en el panel del Administrador.</p>
        <a href="{{ url('/logout') }}" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>

        <div class="options">
            <h2>Opciones de Administración</h2>
            <ul class="options-list">
                <!-- Opción 1: Gestión de usuarios -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-users"></i> Gestión de usuarios
                    </a>
                </li>
                <!-- Opción 2: Gestión de proveedores -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-truck"></i> Gestión de proveedores
                    </a>
                </li>
                <!-- Opción 3: Ver inventario de materias primas -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-box-open"></i> Ver inventario de materias primas
                    </a>
                </li>
                <!-- Opción 4: Ver todas las recepciones -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-list"></i> Ver todas las recepciones
                    </a>
                </li>
                <!-- Opción 5: Gestión de productos terminados -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-cogs"></i> Gestión de productos terminados
                    </a>
                </li>
                <!-- Opción 6: Ver producción en proceso -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-tasks"></i> Ver producción en proceso
                    </a>
                </li>
                <!-- Opción 7: Control de calidad -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-check-circle"></i> Control de calidad
                    </a>
                </li>
                <!-- Opción 8: Generar informes -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-chart-line"></i> Generar informes
                    </a>
                </li>
                <!-- Opción 9: Ver trazabilidad de producción -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-history"></i> Ver trazabilidad de producción
                    </a>
                </li>
                <!-- Opción 10: Configuración del sistema -->
                <li>
                    <a href="#" class="option-link">
                        <i class="fas fa-cogs"></i> Configuración del sistema
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
