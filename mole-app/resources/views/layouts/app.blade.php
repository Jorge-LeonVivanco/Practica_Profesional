<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Moles App')</title>

    <!-- Estilos externos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        header {
            background-color: #2b6cb0;
            color: white;
            padding: 1rem 2rem;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .container {
            max-width: 1100px;
            margin: 2rem auto;
            background-color: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .btn-custom {
            padding: 10px 20px;
            background-color: #3182ce;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #2b6cb0;
        }

        .success-message, .error-message {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .success-message {
            background-color: #e6fffa;
            color: #2f855a;
        }

        .error-message {
            background-color: #fff5f5;
            color: #c53030;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9fafb;
            font-size: 15px;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #3182ce;
            background-color: #fff;
            box-shadow: 0 0 6px rgba(49, 130, 206, 0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table thead {
            background-color: #edf2f7;
        }

        table tr:nth-child(even) {
            background-color: #f9fafb;
        }

        table tr:hover {
            background-color: #f1f5f9;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            table, thead, tbody, th, td, tr {
                display: block;
            }

            table thead {
                display: none;
            }

            table td {
                text-align: right;
                position: relative;
                padding-left: 50%;
            }

            table td::before {
                content: attr(data-label);
                position: absolute;
                left: 16px;
                top: 12px;
                font-weight: bold;
                color: #555;
                text-align: left;
            }
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Opcional: Header común
    <header>
        MolesApp – Gestión de Materias Primas
    </header> -->

    @yield('content')

</body>
</html>
