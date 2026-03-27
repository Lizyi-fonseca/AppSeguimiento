<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro De Intructores</title>
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
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h3 class="card-title mb-4 text-center text-primary"><i class="fas fa-book-reader me-2"></i>Actualizar Instructor</h3>


                    <div class="mb-3 position-relative">
                        <label for="" class="form-label">Número de Documento</label>
                        <P class="p">{{$instructor->numdoc}}</p>


                    </div>

                    <div class="mb-3 position-relative">
                        <label for="">Nombres</label>
                         <P class="p">{{$instructor->nombres}}</p>

                    </div>

                    <div class="mb-3 position-relative">
                          <label for="">Apellidos</label>
                        <p >{{$instructor->apellidos}}</p>

                    </div>
                        <div class="mb-3 position-relative">
                          <label for="">Dirección</label>
                        <p >{{$instructor->direccion}}</p>

                    </div>
                        <div class="mb-3 position-relative">
                        <label for="">Teléfono</label>
                        <p >{{$instructor->telefono}}</p>

                    </div>
                        <div class="mb-3 position-relative">
                        <label for="">Correo Institucional</label>
                        <p >{{$instructor->correoint}}</p>

                    </div>
                        <div class="mb-3 position-relative">
                        <label for="">Correo Personal</label>
                        <p >{{$instructor->correoprs}}</p>

                    </div>
                        <div class="mb-3 position-relative">
                        <label for="">Sexo</label>
                        <p >{{$instructor->sexo}}</p>

                    </div>
                        <div class="mb-3 position-relative">
                        <label for="">Fecha de Nacimiento</label>
                        <p >{{$instructor->fechadn}}</p>

                    </div>
                        <div class="mb-3 position-relative">
                        <label for="">NIS De Roles</label>
                        <p >{{$instructor->tblroles_administrativos_nis}}</p>

                    </div>
                        <div class="mb-3 position-relative">
                        <label for="">NIS De Tipos de Documentos</label>
                        <p >{{$instructor->tbltipos_documentos_nis}}</p>

                    </div>
                        <div class="mb-3 position-relative">
                        <label for="">NIS De EPS</label>
                        <p >{{$instructor->tbl_eps_nis}}</p>

                    </div>
                    <a href="{{route('instructores.index')}}" class="btn w-100"></i>Volver</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>