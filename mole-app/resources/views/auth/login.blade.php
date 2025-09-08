<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="login-body">

    <div class="login-container">
        <!-- Logo -->
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo de la Empresa" class="login-logo">

        <!-- Título -->
        <h1>Iniciar Sesión</h1>

        <!-- Mensaje de error -->
        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulario -->
        <form method="POST" action="{{ url('/login') }}">
            @csrf

            <label for="correo">Correo:</label>
            <input type="email" name="correo" id="correo" required autocomplete="username" placeholder="correo@ejemplo.com">

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" required autocomplete="current-password" placeholder="••••••••">

            <button type="submit">Entrar</button>
        </form>
    </div>

</body>
</html>
