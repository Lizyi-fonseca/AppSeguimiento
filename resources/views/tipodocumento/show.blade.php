<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tipo documentos</title>
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
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h3 class="card-title mb-4 text-center text-primary"><i class="fas fa-book-reader me-2"></i>Actualizar Tipo De Documento</h3>


                    <div class="mb-3 position-relative">
                        <label for="" class="form-label">nis</label>
                        <P class="p">{{$tiposD->nis}}</p>


                    </div>

                    <div class="mb-3 position-relative">
                          <label for="">Denominación</label>
                        <p >{{$tiposD->denominacion}}</p>

                    </div>

                    <div class="mb-3 position-relative">
                          <label for="">Observaciones</label>
                        <p >{{$tiposD->observaciones}}</p>

                    </div>
                    <a href="{{route('tipodocumento.index')}}" class="btn w-100"></i>Volver</a>
            </div>
        </div>
    </div>
</div>
    

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>