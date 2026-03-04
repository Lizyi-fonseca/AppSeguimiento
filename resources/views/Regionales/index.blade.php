<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Regionales</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f4f8fc;
            /* mismo fondo suave */
        }

        .card-custom {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .header-custom {
            background-color: #1b4965;
            /* azul claro formal */
            color: white;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .table thead {
            background-color: #1b4965;
            /* mismo azul */
            color: white;
        }

        .table tbody tr:hover {
            background-color: #eef4fb;
            /* hover suave */
        }

        .title-text {
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <div class="card card-custom">

            <div class="card-header header-custom">
                <h4 class="mb-0 title-text">Listado de Regionales</h4>
            </div>


            <div class="container py-5">

                <div class="card card-custom p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="header-title">Lista de Programas de Formación</h2>

                        <a href="{{ route('programas.create') }}" class="btn btn-primary-custom text-white">
                            <i class="fa-solid fa-circle-plus me-2"></i> Crear Programa
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" regional="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" regional="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover align-middle text-center">

                                <thead>
                                    <tr>
                                        <th>NIS</th>
                                        <th>Código</th>
                                        <th>Denominación</th>
                                        <th>Dirección</th>
                                        <th>Observación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse ($regionales as $regional)
                                        <tr>
                                            <td>{{ $regional->nis }}</td>
                                            <td>{{ $regional->codigo }}</td>
                                            <td class="fw-semibold text-start">
                                                {{ $regional->denominacion }}
                                            </td>
                                            <td class="text-start">
                                                {{ $regional->direccion }}
                                            </td>
                                            <td class="text-start">
                                                @if ($regional->observacion)
                                                    {{ $regional->observacion }}
                                                @else
                                                    <span class="text-muted">Sin observación</span>
                                                @endif
                                            </td>

                                            <td >
                                                <div class="acciones justify-content-center d-flex gap-2">

                                                    <form action="{{ route('Regionales.delete', $regional->nis) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-danger btn-icon btn-eliminar">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        </button>
                                                    </form>

                                                    <a href="{{ route('Regionales.edit', $regional->nis) }}"
                                                        class="btn btn-warning btn-icon">
                                                        <i class="fa-solid fa-pen-clip"></i>
                                                    </a>

                                                    <a href="{{ route('Regionales.show', $regional->nis) }}"
                                                        class="btn btn-info btn-icon text-white">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">
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
                    document.addEventListener("DOMContentLoaded", function() {

                        const botones = document.querySelectorAll(".btn-eliminar");

                        botones.forEach(function(boton) {
                            boton.addEventListener("click", function() {

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
