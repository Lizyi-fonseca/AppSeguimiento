<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Programas</title>

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
                <h3 class="card-title mb-4 text-center text-primary"><i class="fas fa-book-reader me-2"></i>Registro de Programas</h3>

                <!-- Formulario -->
                <form action="{{ route('programas.store') }}" method="POST">
                    @csrf


                    

                    <div class="mb-3 position-relative">
                        <input type="text" class="form-control" name="codigo" placeholder="Código" >

                        @error('codigo')
                        <p class="text-danger">{{$message}}</p>
                         @enderror

                    </div>

                    <div class="mb-3 position-relative">
                        <input type="text" class="form-control" name="denominacion" placeholder="Denominación" >
                          @error('denominacion')
                        <p class="text-danger">{{$message}}</p>
                         @enderror
                    </div>

                    <div class="mb-3 position-relative">
                        <textarea class="form-control" name="observaciones" rows="4" placeholder="Observaciones"></textarea>
                          @error('observaciones')
                        <p class="text-danger">{{$message}}</p>
                         @enderror

                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-2"><i class="fas fa-save me-2"></i>Registrar Programa</button>
                    <a href="{{route('programas.index')}}" class="btn w-100"></i>Volver</a>
                
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
