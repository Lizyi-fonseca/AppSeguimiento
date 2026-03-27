<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle del Aprendiz</title>
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

        .info-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 2px;
        }

        .info-value {
            background-color: #f8f9fa;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-left: 4px solid #1b4965;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <h3 class="card-title mb-4 text-center text-primary">
                        <i class="fas fa-user-circle me-2"></i>Detalles del Aprendiz
                    </h3>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-label">NIS</div>
                            <div class="info-value">{{ $aprendiz->nis }}</div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-label">Número de Documento</div>
                            <div class="info-value">{{ $aprendiz->numdoc }}</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-label">Nombres</div>
                            <div class="info-value">{{ $aprendiz->nombres }}</div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-label">Apellidos</div>
                            <div class="info-value">{{ $aprendiz->apellidos }}</div>
                        </div>
                    </div>

                    <div class="info-label">Dirección</div>
                    <div class="info-value">{{ $aprendiz->direccion }}</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-label">Teléfono</div>
                            <div class="info-value">{{ $aprendiz->telefono }}</div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-label">Sexo</div>
                            <div class="info-value">
                                @if ($aprendiz->sexo == 1)
                                    Masculino
                                @elseif($aprendiz->sexo == 2)
                                    Femenino
                                @else
                                    Otro
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-label">Correo Institucional</div>
                            <div class="info-value">{{ $aprendiz->correoint }}</div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-label">Correo Personal</div>
                            <div class="info-value">{{ $aprendiz->correoprs ?: 'No registrado' }}</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-label">Fecha de Nacimiento</div>
                            <div class="info-value">{{ \Carbon\Carbon::parse($aprendiz->fechadn)->format('d/m/Y') }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-label">Tipo de Documento</div>
                            <div class="info-value">{{ $aprendiz->tiposdocumento->nombre ?? 'N/A' }}</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-label">Ficha de Caracterización</div>
                            <div class="info-value">{{ $aprendiz->ficha->nombre ?? 'N/A' }}</div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-label">EPS</div>
                            <div class="info-value">{{ $aprendiz->eps->nombre ?? 'N/A' }}</div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Volver a la lista
                        </a>
                        <a href="{{ route('aprendices.edit', $aprendiz->nis) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
