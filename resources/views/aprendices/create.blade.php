<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Aprendiz</title>
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
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h3 class="card-title mb-4 text-center text-primary"><i class="fas fa-book-reader me-2"></i>Registro
                        de Aprendiz</h3>

                    <!-- Formulario -->
                    <form action="{{ route('aprendices.store') }}" method="POST">
                        @csrf

                        <!-- Número de Documento -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-id-card form-icon"></i>
                            <input type="number" class="form-control form-input @error('numdoc') is-invalid @enderror"
                                name="numdoc" placeholder="Número De Documento" value="{{ old('numdoc') }}">
                            @error('numdoc')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nombres -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-user form-icon"></i>
                            <input type="text" class="form-control form-input @error('nombres') is-invalid @enderror"
                                name="nombres" placeholder="Nombres" value="{{ old('nombres') }}">
                            @error('nombres')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Apellidos -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-user form-icon"></i>
                            <input type="text"
                                class="form-control form-input @error('apellidos') is-invalid @enderror"
                                name="apellidos" placeholder="Apellidos" value="{{ old('apellidos') }}">
                            @error('apellidos')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Dirección -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-map-marker-alt form-icon"></i>
                            <input type="text"
                                class="form-control form-input @error('direccion') is-invalid @enderror"
                                name="direccion" placeholder="Dirección" value="{{ old('direccion') }}">
                            @error('direccion')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-phone form-icon"></i>
                            <input type="text"
                                class="form-control form-input @error('telefono') is-invalid @enderror" name="telefono"
                                placeholder="Teléfono" value="{{ old('telefono') }}">
                            @error('telefono')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Correo Institucional -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-envelope form-icon"></i>
                            <input type="email"
                                class="form-control form-input @error('correoint') is-invalid @enderror"
                                name="correoint" placeholder="Correo Institucional" value="{{ old('correoint') }}">
                            @error('correoint')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Correo Personal -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-envelope form-icon"></i>
                            <input type="email"
                                class="form-control form-input @error('correoprs') is-invalid @enderror"
                                name="correoprs" placeholder="Correo Personal" value="{{ old('correoprs') }}">
                            @error('correoprs')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sexo -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-venus-mars form-icon"></i>
                            <select name="sexo" class="form-control form-input @error('sexo') is-invalid @enderror">
                                <option value="">Seleccione sexo</option>
                                <option value="1" {{ old('sexo') == 1 ? 'selected' : '' }}>Masculino</option>
                                <option value="2" {{ old('sexo') == 2 ? 'selected' : '' }}>Femenino</option>
                                <option value="3" {{ old('sexo') == 3 ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('sexo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-calendar form-icon"></i>
                            <input type="date" class="form-control form-input @error('fechadn') is-invalid @enderror"
                                name="fechadn" value="{{ old('fechadn') }}">
                            @error('fechadn')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tipo de Documento -->
                        <div class="mb-3">
                            <select name="tbltipos_documentos_nis"
                                class="form-control @error('tbltipos_documentos_nis') is-invalid @enderror">
                                <option value="">Seleccione un tipo de documento</option>
                                @foreach ($tiposdocumento as $tipo)
                                    <option value="{{ $tipo->nis }}"
                                        {{ old('tbltipos_documentos_nis') == $tipo->nis ? 'selected' : '' }}>
                                        {{ $tipo->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbltipos_documentos_nis')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Ficha de Caracterización -->
                        <div class="mb-3">
                            <select name="tblfichasde_caracterizacion_nis"
                                class="form-control @error('tblfichasde_caracterizacion_nis') is-invalid @enderror">
                                <option value="">Seleccione una ficha de caracterización</option>
                                @foreach ($fichas as $ficha)
                                    <option value="{{ $ficha->nis }}"
                                        {{ old('tblfichasde_caracterizacion_nis') == $ficha->nis ? 'selected' : '' }}>
                                        {{ $ficha->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tblfichasde_caracterizacion_nis')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- EPS -->
                        <div class="mb-3">
                            <select name="tbl_eps_nis"
                                class="form-control @error('tbl_eps_nis') is-invalid @enderror">
                                <option value="">Seleccione una EPS</option>
                                @foreach ($eps as $ep)
                                    <option value="{{ $ep->nis }}"
                                        {{ old('tbl_eps_nis') == $ep->nis ? 'selected' : '' }}>
                                        {{ $ep->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbl_eps_nis')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-save me-2"></i>Registrar Aprendiz
                        </button>
                        <a href="{{ route('aprendices.index') }}" class="btn btn-secondary w-100">
                            <i class="fas fa-arrow-left me-2"></i>Volver
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
