<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Notificación - Sistema de Seguimiento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f4f6f9;
      font-family: Arial, Helvetica, sans-serif;
    }

    .container {
      width: 100%;
      padding: 20px;
    }

    .card {
      max-width: 500px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .header {
      background-color: #198754;
      color: white;
      text-align: center;
      padding: 20px;
      font-size: 20px;
      font-weight: bold;
    }

    .body {
      padding: 30px;
      text-align: center;
      color: #333;
    }

    .body img {
      margin-bottom: 20px;
    }

    .button {
      display: inline-block;
      padding: 12px 25px;
      background-color: #198754;
      color: #ffffff !important;
      text-decoration: none;
      border-radius: 5px;
      margin-top: 20px;
      font-weight: bold;
    }

    .footer {
      text-align: center;
      padding: 15px;
      font-size: 12px;
      color: #888;
      background-color: #f1f1f1;
    }

    @media screen and (max-width: 600px) {
      .body {
        padding: 20px;
      }
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="card">

      <!-- Header -->
      <div class="header">
        Sistema de Seguimiento
      </div>

      <!-- Body -->
      <div class="body">

        <!-- Logo -->
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/SENA_Colombia_logo.svg" width="100" alt="Logo SENA">

        <h2>Hola, Usuario {{ $usuraio->name }}</h2>

        <p>
            Nombre de la bitácora: {{ $archivo_user }}
        </p>

        <p>
          Tu bitacora se ha registrado correctamente en el sistema. Gracias por mantener tu información actualizada.
        </p>

        <p>
          Ingresa para revisar los detalles y continuar con el proceso.
        </p>

        <!-- Botón -->
        <a href="{{ url('bitacora') }}" class="button">
          Ir al sistema
        </a>

      </div>

      <!-- Footer -->
      <div class="footer">
        © 2026 SENA - Proyecto Formativo
      </div>

    </div>
  </div>

</body>
</html>