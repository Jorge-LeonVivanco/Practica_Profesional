<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container">
        <!-- Logo de la empresa (espacio reservado) -->
        <div class="logo-container">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo de la Empresa" class="logo"> <!-- Logo -->
        </div>

        <!-- Título del formulario -->
        <h1>Iniciar Sesión</h1>

        <!-- Mostrar mensaje de error si existe -->
        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulario -->
        <form method="POST" action="{{ url('/login') }}">
            @csrf

            <!-- Campo de correo -->
            <div>
                <label for="correo">Correo:</label>
                <input type="email" name="correo" id="correo" required>
            </div>

            <!-- Campo de contraseña -->
            <div>
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" required>
            </div>

            <!-- Botón de submit -->
            <button type="submit">Entrar</button>
        </form>
    </div>

</body>
</html>
