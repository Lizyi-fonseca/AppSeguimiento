<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitácoras</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- 🔹 ESTILO PROFESIONAL SOLO PARA LA TABLA -->
    <style>

        .table thead {
            background-color: #1b4965;
        }

        .table thead th {
            color: #ffffff;
            font-weight: 600;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            font-size: 14px;
            border-bottom: none;
        }

        .table tbody tr {
            transition: all 0.2s ease-in-out;
        }

        .table tbody tr:hover {
            background-color: #f4f8fb;
        }

        .table td {
            vertical-align: middle;
            font-size: 15px;
        }

        .acciones {
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .table a {
            font-weight: 500;
            color: #1b4965;
            text-decoration: none;
        }

        .table a:hover {
            text-decoration: underline;
        }

        .table {
            border-radius: 8px;
            overflow: hidden;
        }

    </style>

</head>
<body>

<div class="container py-5">

    <div class="card card-custom p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="header-title">Lista de bitacoras</h2>

            <a href="{{route('bitacora.create')}}" class="btn btn-primary-custom text-red">
                <i class="fa-solid fa-circle-plus me-2"></i> Crear Bitacora
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
                        <th>Archivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($bit as $bita)
                    <tr>
                        <td>{{ $bita->nis }}</td>
                        <td>
                            <a href="{{ asset($bita->archivo) }}" target="_blanck">Ver</a>
                        </td>
                        
                        <td>
                            <div class="acciones justify-content-center">

                                <form action="{{ route('programas.delete', $bita->nis) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-icon btn-eliminar">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>

                                <a href="{{route('programas.edit', $bita->nis)}}" 
                                   class="btn btn-warning btn-icon">
                                    <i class="fa-solid fa-pen-clip"></i>
                                </a>

                                <a href="{{route('programas.show', $bita->nis)}}" 
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
