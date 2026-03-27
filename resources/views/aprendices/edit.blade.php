<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Aprendiz</title>
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
                    <h3 class="card-title mb-4 text-center text-primary">
                        <i class="fas fa-edit me-2"></i>Actualizar Aprendiz
                    </h3>

                    <!-- Formulario -->
                    <form action="{{ route('aprendices.update', $aprendiz->nis) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Número de Documento -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-id-card form-icon"></i>
                            <input type="number" class="form-control form-input @error('numdoc') is-invalid @enderror"
                                name="numdoc" placeholder="Número de documento"
                                value="{{ old('numdoc', $aprendiz->numdoc) }}">
                            @error('numdoc')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nombres -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-user form-icon"></i>
                            <input type="text" class="form-control form-input @error('nombres') is-invalid @enderror"
                                name="nombres" placeholder="Nombres" value="{{ old('nombres', $aprendiz->nombres) }}">
                            @error('nombres')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Apellidos -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-user form-icon"></i>
                            <input type="text"
                                class="form-control form-input @error('apellidos') is-invalid @enderror"
                                name="apellidos" placeholder="Apellidos"
                                value="{{ old('apellidos', $aprendiz->apellidos) }}">
                            @error('apellidos')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Dirección -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-map-marker-alt form-icon"></i>
                            <input type="text"
                                class="form-control form-input @error('direccion') is-invalid @enderror"
                                name="direccion" placeholder="Dirección"
                                value="{{ old('direccion', $aprendiz->direccion) }}">
                            @error('direccion')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-phone form-icon"></i>
                            <input type="text"
                                class="form-control form-input @error('telefono') is-invalid @enderror" name="telefono"
                                placeholder="Teléfono" value="{{ old('telefono', $aprendiz->telefono) }}">
                            @error('telefono')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Correo Institucional -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-envelope form-icon"></i>
                            <input type="email"
                                class="form-control form-input @error('correoint') is-invalid @enderror"
                                name="correoint" placeholder="Correo Institucional"
                                value="{{ old('correoint', $aprendiz->correoint) }}">
                            @error('correoint')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Correo Personal -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-envelope form-icon"></i>
                            <input type="email"
                                class="form-control form-input @error('correoprs') is-invalid @enderror"
                                name="correoprs" placeholder="Correo Personal"
                                value="{{ old('correoprs', $aprendiz->correoprs) }}">
                            @error('correoprs')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sexo -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-venus-mars form-icon"></i>
                            <select name="sexo" class="form-control form-input @error('sexo') is-invalid @enderror">
                                <option value="">Seleccione sexo</option>
                                <option value="1" {{ old('sexo', $aprendiz->sexo) == 1 ? 'selected' : '' }}>
                                    Masculino</option>
                                <option value="2" {{ old('sexo', $aprendiz->sexo) == 2 ? 'selected' : '' }}>
                                    Femenino</option>
                                <option value="3" {{ old('sexo', $aprendiz->sexo) == 3 ? 'selected' : '' }}>Otro
                                </option>
                            </select>
                            @error('sexo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="mb-3 position-relative">
                            <i class="fas fa-calendar form-icon"></i>
                            <input type="date" class="form-control form-input @error('fechadn') is-invalid @enderror"
                                name="fechadn" value="{{ old('fechadn', $aprendiz->fechadn) }}">
                            @error('fechadn')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Estos campos son solo para mostrar, no se pueden editar -->
                        <div class="mb-3">
                            <label class="form-label text-muted">Tipo de Documento (No editable)</label>
                            <input type="text" class="form-control"
                                value="{{ $aprendiz->tiposdocumento->nombre ?? 'N/A' }}" readonly disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Ficha de Caracterización (No editable)</label>
                            <input type="text" class="form-control"
                                value="{{ $aprendiz->ficha->nombre ?? 'N/A' }}" readonly disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">EPS (No editable)</label>
                            <input type="text" class="form-control" value="{{ $aprendiz->eps->nombre ?? 'N/A' }}"
                                readonly disabled>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-save me-2"></i>Actualizar Aprendiz
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
