<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrativo</title>

    <!-- Bootstrap 5.2.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> 

    <style>
        body {
            background-color: #eef4ff; /* azul suave */
        }

        .btn-custom {
            background-color: #4e73df; /* azul principal */
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #2e59d9; /* azul hover */
            color: white;
        }

        .text-primary {
            color: #4e73df !important;
        }
    </style>

</head>
<body>

<div class="container mt-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Panel Administrativo</h1>
        <p class="text-muted">Sistema de Gestión</p>
    </div>

    <div class="row g-4">

        <!-- Programas -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Programas de Formación</h5>
                    <a href="{{route('programas.index')}}" class="btn btn-custom w-100">
                        Ir a Programas
                    </a>
                </div>
            </div>
        </div>

        <!-- Roles Administrativos -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Roles Administrativos</h5>
                    <a href="#" class="btn btn-custom w-100">
                        Ver Roles
                    </a>
                </div>
            </div>
        </div>

        <!-- EPS -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">EPS</h5>
                    <a href="{{ route('Eps.index') }}" class="btn btn-custom w-100">
                        Ver EPS
                    </a>
                </div>
            </div>
        </div>

        <!-- Regionales -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Regionales</h5>
                    <a href="{{ route('rigionale.index') }}" class="btn btn-custom w-100">
                        Ver Regionales
                    </a>
                </div>
            </div>
        </div>

        <!-- Tipos de Documentos -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Tipos de Documentos</h5>
                    <a href="{{ route('Tipos_documentos.index') }}" class="btn btn-custom w-100">
                        Ver Tipos
                    </a>
                </div>
            </div>
        </div>

        <!-- Bitácoras -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Bitacoras</h5>
                    <a href="{{ url('Bitacora') }}" class="btn btn-custom w-100">
                        Ver bitacoras
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- Bootstrap 5.2.3 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
