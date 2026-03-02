<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitacoras</title>

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
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #495057;
        }
        .form-input {
            padding-left: 40px;
        }
    </style>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">



    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" bit="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" bit="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



<div class="card shadow-lg p-4" style="width: 480px; border-radius: 18px;">
    
    <h4 class="text-center mb-4">Subir Bitácora PDF</h4>

    <form action="{{route('bitacora.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text">
                   <i class="fa-regular fa-file-pdf text-danger"></i>
                </span>
                <input type="file" name="archivo" class="form-control"  />
            </div>
            <div class="form-text">Solo archivos PDF permitidos</div>

            @error('archivo')
            <p class="text-danger mt-3">
                {{$message}}
            </p>
                
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-upload"></i> Cargar PDF
        </button>

    </form>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
