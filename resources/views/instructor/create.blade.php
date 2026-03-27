<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro De Instructores</title>
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
                <h3 class="card-title mb-4 text-center text-primary"><i class="fas fa-book-reader me-2"></i>Registro De Instructores</h3>

                <!-- Formulario -->
                <form action="{{ route('instructores.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 position-relative">
                        <input type="text" class="form-control" name="numdoc" placeholder="Número de Documento" >

                        @error('numdoc')
                        <p class="text-danger">{{$message}}</p>
                         @enderror

                    </div>

                    <div class="mb-3 position-relative">
                        <input type="text" class="form-control" name="nombres" placeholder="Nombres" >
                          @error('nombres')
                        <p class="text-danger">{{$message}}</p>
                         @enderror
                    </div>

                    <div class="mb-3 position-relative">
                        <textarea class="form-control" name="apellidos" rows="4" placeholder="Apellidos"></textarea>
                          @error('apellidos')
                        <p class="text-danger">{{$message}}</p>
                         @enderror

                    </div>
                         <div class="mb-3 position-relative">
                        <textarea class="form-control" name="direccion" rows="4" placeholder="Dirección"></textarea>
                          @error('direccion')
                        <p class="text-danger">{{$message}}</p>
                         @enderror

                    </div>
                    
                    </div>
                         <div class="mb-3 position-relative">
                        <textarea class="form-control" name="telefono" rows="4" placeholder="Teléfono"></textarea>
                          @error('telefono')
                        <p class="text-danger">{{$message}}</p>
                         @enderror

                    </div>
                          </div>
                         <div class="mb-3 position-relative">
                        <textarea class="form-control" name="correoint" rows="4" placeholder="Correo Institucional"></textarea>
                          @error('correoint')
                        <p class="text-danger">{{$message}}</p>
                         @enderror

                    </div>
                        <div class="mb-3 position-relative">
                        <textarea class="form-control" name="correoprs" rows="4" placeholder="Correo Personal"></textarea>
                          @error('correoprs')
                        <p class="text-danger">{{$message}}</p>
                         @enderror

                    </div>

                        <div class="mb-3 position-relative">
                        <textarea class="form-control" name="sexo" rows="4" placeholder="Sexo"></textarea>
                          @error('sexo')
                        <p class="text-danger">{{$message}}</p>
                         @enderror

                    </div>
                        <div class="mb-3 position-relative">
                        <textarea class="form-control" name="fechadn" rows="4" placeholder="Fecha de Nacimiento"></textarea>
                          @error('fechadn')
                        <p class="text-danger">{{$message}}</p>
                         @enderror

                    </div>

                        <div class="mb-3 position-relative">
                        <textarea class="form-control" name="tblroles_administrativos_nis" rows="4" placeholder="NIS De Roles Administrativas"></textarea>
                          @error('tblroles_administrativos_nis')
                        <p class="text-danger">{{$message}}</p>
                         @enderror

                    </div>

                        <div class="mb-3 position-relative">
                        <textarea class="form-control" name="tbltipos_documentos_nis" rows="4" placeholder="NIS De Tipos de Documentos"></textarea>
                          @error('tbltipos_documentos_nis')
                        <p class="text-danger">{{$message}}</p>
                         @enderror

                    </div>
                        <div class="mb-3 position-relative">
                        <textarea class="form-control" name="tbl_eps_nis" rows="4" placeholder="NIS De EPS"></textarea>
                          @error('tbl_eps_nis')
                        <p class="text-danger">{{$message}}</p>
                         @enderror

                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-2"><i class="fas fa-save me-2"></i>Registrar Instructor</button>
                    <a href="{{route('instructor.index')}}" class="btn w-100"></i>Volver</a>
                
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>