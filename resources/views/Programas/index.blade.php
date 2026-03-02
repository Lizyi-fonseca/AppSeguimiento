<!DOCTYPE html>
<html>
<head>
    <title>Programas de Formación</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background-color: #f4f8fc;
        }

        .card-custom {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .header-title {
            color: #0d3b66;
            font-weight: 600;
        }

        .btn-primary-custom {
            background-color: #1b4965;
            border: none;
        }

        .btn-primary-custom:hover {
            background-color: #163d56;
        }

        .table thead {
            background-color: #1b4965;
            color: white;
        }

        .btn-icon {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
        }

        .acciones {
            display: flex;
            gap: 6px;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="card card-custom p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="header-title">Lista de Programas de Formación</h2>

            <a href="{{route('programas.create')}}" class="btn btn-primary-custom text-white">
                <i class="fa-solid fa-circle-plus me-2"></i> Crear Programa
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">

                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Código</th>
                        <th>Denominación</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($programas as $programa)
                    <tr>
                        <td>{{ $programa->nis }}</td>
                        <td>{{ $programa->codigo }}</td>
                        <td class="fw-semibold text-start">{{ $programa->denominacion }}</td>
                        <td class="text-start">
                            @if ($programa->observaciones)
                                {{ $programa->observaciones }}
                            @else
                                <span class="text-muted">No tiene información</span>
                            @endif
                        </td>

                        <td>
                            <div class="acciones justify-content-center">

                                <form action="{{ route('programas.delete', $programa->nis) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-icon btn-eliminar">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>

                                <a href="{{route('programas.edit', $programa->nis)}}" 
                                   class="btn btn-warning btn-icon">
                                    <i class="fa-solid fa-pen-clip"></i>
                                </a>

                                <a href="{{route('programas.show', $programa->nis)}}" 
                                   class="btn btn-info btn-icon text-white">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-muted py-4">
                            No hay información registrada
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const botones = document.querySelectorAll(".btn-eliminar");

    botones.forEach(function(boton) {
        boton.addEventListener("click", function () {

            const formulario = this.closest("form");

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1b4965',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    formulario.submit();
                }
            });

        });
    });

});
</script>

</body>
</html>
