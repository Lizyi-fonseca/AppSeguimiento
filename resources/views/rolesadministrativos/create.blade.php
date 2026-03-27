<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Rol Administrativo</title>

    <!-- Bootstrap 5.2.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f7fa;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <form action="{{ route('rolesadministrativos.store') }}" method="POST">
                        @csrf
                        <h3 class="card-title mb-4 text-center text-primary">
                            <i class="fas fa-user-shield me-2"></i>Detalles del Rol Administrativo
                        </h3>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del rol:</label>
                            <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}">
                            @error('descripcion')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>


                        <button type="submit" class="btn btn-primary w-100 mb-2"><i
                        class="fas fa-save me-2"></i>Registrar Rol</button>
                        <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary w-100"><i
                            class="fas fa-arrow-left me-2"></i>Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
