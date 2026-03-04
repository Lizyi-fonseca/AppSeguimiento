<!DOCTYPE html>
<html>

<head>
    <title>Roles administrativos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<div class="container mt-4">
    <h1 class="text-center text-secondary mb-4">Lista De Roles Administrativos</h1>

    <div class="px-5">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- BOTÓN CREAR -->
        <div class="mb-3 text-end">
            <a href="{{ route('RolesAdministrativos.create') }}" 
               class="btn btn-success btn-sm">
                <i class="fa-solid fa-circle-plus me-1"></i> Crear Rol
            </a>
        </div>

        <table class="table table-bordered text-center align-middle">
            <thead class="table-light">
                <tr class="text-secondary">
                    <th>NIS</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse($roles as $rol)
                    <tr>
                        <td>{{ $rol->nis }}</td>

                        <td>
                            @if ($rol->descripcion)
                                {{ $rol->descripcion }}
                            @else
                                <span class="text-secondary">No tiene información</span>
                            @endif
                        </td>

                        <td>
    <div class="btn-group" role="group" aria-label="Acciones">
        <!-- VER -->
        <a href="{{ route('RolesAdministrativos.show', $rol->nis) }}"
           class="btn btn-primary btn-sm mx-1" title="Ver">
            <i class="fa-solid fa-eye"></i>
        </a>

        <!-- EDITAR -->
        <a href="{{ route('RolesAdministrativos.edit', $rol->nis) }}"
           class="btn btn-warning btn-sm mx-1" title="Editar">
            <i class="fa-solid fa-pen-clip"></i>
        </a>

        <!-- ELIMINAR -->
        <form action="{{ url('Roles_administrativos/delete', $rol->nis) }}" method="POST"
              class="d-inline form-eliminar mx-1">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger btn-sm btn-eliminar" title="Eliminar">
                <i class="fa-regular fa-trash-can"></i>
            </button>
        </form>
    </div>
</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay información</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
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
                confirmButtonColor: '#d33',
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