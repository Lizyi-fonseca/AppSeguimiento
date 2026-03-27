<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AppSeguimientos - Sistema de Seguimiento</title>
    
    <!-- Bootstrap 5.2.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 (versión gratuita) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Estilos personalizados adicionales -->
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        main {
            flex: 1;
        }
        
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #667eea 100%);
            color: white;
            padding: 100px 0;
            border-radius: 0 0 50px 50px;
        }
        
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 15px;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,.1);
        }
        
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 40px 0 20px 0;
        }
        
        .footer a {
            color: white;
            transition: opacity 0.3s ease;
        }
        
        .footer a:hover {
            opacity: 0.8;
        }
        
        .social-icon {
            font-size: 1.5rem;
            margin: 0 10px;
            display: inline-block;
        }
        
        .btn-custom {
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-custom:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <!-- Logo y nombre a la izquierda -->
            <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
                <i class="fas fa-chart-line me-2"></i>
                AppSeguimientos
            </a>
            
            <!-- Botón para móvil -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Contenido del navbar - alineado a la derecha -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <!-- Usuario autenticado - muestra Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary btn-custom text-white px-4 mx-1" href="{{ route('home') }}">
                                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                            </a>
                        </li>
                    @else
                        <!-- Usuario no autenticado - muestra Login y Register -->
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary btn-custom px-4 mx-1" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary btn-custom text-white px-4 mx-1" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-2"></i>Registrarse
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container text-center">
                <h1 class="display-4 fw-bold mb-4">
                    <i class="fas fa-tasks me-3"></i>
                    Bienvenido a AppSeguimientos
                </h1>
                <p class="lead mb-4">
                    Una solución tecnológica para tu seguimiento de etapa productiva
                </p>
                @guest
                 
                @endguest
                @auth
                    <div class="mt-4">
                        <a href="{{ route('home') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-arrow-right me-2"></i>Ir al Dashboard
                        </a>
                    </div>
                @endauth
            </div>
        </section>

        <!-- Características principales -->
        <section class="py-5">
            <div class="container">
                <h2 class="text-center mb-5 fw-bold">Todo lo que tenemos para tí</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card feature-card h-100 shadow-sm">
                            <div class="card-body text-center p-4">
                                <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
                                <h5 class="card-title fw-bold">Seguimiento de etapa productiva</h5>
                                <p class="card-text text-muted">Mediante esta herramienta tecnológica podemos hacer seguimiento de tu proceso de etapa productiva.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card feature-card h-100 shadow-sm">
                            <div class="card-body text-center p-4">
                                <i class="fas fa-users fa-3x text-primary mb-3"></i>
                                <h5 class="card-title fw-bold">Asignación de Instructores </h5>
                                <p class="card-text text-muted">La asignación inmediata de tu instructor de seguimiento.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card feature-card h-100 shadow-sm">
                            <div class="card-body text-center p-4">
                                <i class="fas fa-chart-pie fa-3x text-primary mb-3"></i>
                                <h5 class="card-title fw-bold">Consolidación de bitacoras</h5>
                                <p class="card-text text-muted">Puedes cargar tus bitacoras de seguimiento, con el fin de mantener el registro de tu proceso.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       

        <!-- Llamada a la acción -->
        <section class="py-5">
            <div class="container text-center">
                <div class="bg-primary text-white rounded-4 p-5">
                    <h2 class="fw-bold mb-3">¿Listo para iniciar tu etapa productiva?</h2>
                    <p class="lead mb-4">Registra tus datos y sumate a esta experiencia</p>
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-user-plus me-2"></i>Regístrate 
                        </a>
                    @endguest
                    @auth
                        <a href="{{ route('home') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-tachometer-alt me-2"></i>Ir al Dashboard
                        </a>
                    @endauth
                </div>
            </div>
        </section>
    </main>

    <!-- Footer con redes sociales -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-chart-line me-2"></i>AppSeguimientos
                    </h5>
                    <p class="small">Sistema de seguimiento para la etapa productiva de los aprendices SENA del Centro de Logistica y Promoción ecoturística del Magdalena.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/') }}" class="text-decoration-none">Inicio</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">Acerca de</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">Servicios</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Síguenos</h5>
                    <div class="social-links">
                        <a href="#" class="social-icon" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-icon" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="social-icon" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                    <div class="mt-3">
                        <p class="small mb-0"><i class="fas fa-envelope me-2"></i>info@appseguimientos.com</p>
                        <p class="small"><i class="fas fa-phone me-2"></i>+57 (322) 515-3071</p>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-3 bg-light">
            <div class="row">
                <div class="col text-center">
                    <p class="small mb-0">&copy; {{ date('Y') }} AppSeguimientos. SENA.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle con Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>