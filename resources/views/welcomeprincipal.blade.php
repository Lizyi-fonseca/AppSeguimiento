<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>App de Seguimiento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <style>
    .hero-img {
      height: 420px;
      object-fit: cover;
      width: 100%;
      border-radius: 10px;
    }

    .img-hover {
      transition: transform 0.4s ease;
    }

    .img-hover:hover {
      transform: scale(1.05);
    }
  </style>
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <img src="img/logo-sena.png" alt="Logo SENA" width="40" class="mr-2">
        <span class="brand-text font-weight-light">Seguimiento SENA</span>
      </a>

      <div class="ml-auto">
        <a href="login.html" class="btn btn-success">Iniciar </a>
      </div>
    </div>
  </nav>

  <!-- Contenido -->
  <div class="content-wrapper">
    <div class="content">
      <div class="container mt-4">

        <!-- BIENVENIDA -->
        <div class="text-center mb-4">
          <h1 class="font-weight-bold">Bienvenido</h1>
          <h4 class="text-muted">Sistema de Seguimiento Etapa Productiva</h4>
        </div>

        <!-- IMAGEN PRINCIPAL -->
        <div class="mb-4">
          <img src="img/centro1.jpg" class="hero-img shadow">
        </div>

        <!-- BOTONES -->
        <div class="text-center mb-5">
          <a href="login.html" class="btn btn-success btn-lg mr-2">
            Iniciar sesión
          </a>
          <a href="registro.html" class="btn btn-outline-secondary btn-lg">
            Registrarse
          </a>
        </div>

        <!-- GALERÍA -->
        <div class="row">
          <div class="col-md-6 mb-4">
            <img src="img/centro2.jpg" class="img-fluid rounded shadow img-hover">
          </div>

          <div class="col-md-6 mb-4">
            <img src="img/centro3.jpg" class="img-fluid rounded shadow img-hover">
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="main-footer text-center">
    <strong>2026 SENA - Proyecto Formativo</strong>
  </footer>

</div>

<!-- Scripts -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>