
<!DOCTYPE html>
@extends('adminlte::page')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@section('title', 'Home')

@section('content')
    <div class="container py-5">

    <div class="card card-custom p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="header-title">Lista De Instructores</h2>

            <a href="{{route('instructores.create')}}" class="btn btn-primary-custom text-white">
                <i class="fa-solid fa-circle-plus me-2"></i> Crear Instructor
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
                        <th>Documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Correo Intitucional</th>
                        <th>Correo Personal</th>
                        <th>Fecha De Nacimiento</th>
                        <th>Tipo Docuementos</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($instructores as $instructor)
                    <tr>
                        <td>{{ $instructor->nis }}</td>
                        <td>{{ $instructor->numdoc }}</td>
                        <td class="fw-semibold text-start">{{ $instructor->nombres }}</td>
                        <td class="text-start">
                            @if ($instructor->apellidos)
                                {{ $instructor->apellidos }}
                            @else
                                <span class="text-muted">No tiene información</span>
                            @endif
                        </td>
                              <td class="text-start">
                            @if ($instructor->direccion)
                                {{ $instructor->direccion }}
                            @else
                                <span class="text-muted">No tiene información</span>
                            @endif
                        </td>
                            <td class="text-start">
                            @if ($instructor->telefono)
                                {{ $instructor->telefono }}
                            @else
                                <span class="text-muted">No tiene información</span>
                            @endif
                        </td>
                           <td class="text-start">
                            @if ($instructor->correoint)
                                {{ $instructor->correoint }}
                            @else
                                <span class="text-muted">No tiene información</span>
                            @endif
                        </td>
                          <td class="text-start">
                            @if ($instructor->sexo)
                                {{ $instructor->sexo }}
                            @else
                                <span class="text-muted">No tiene información</span>
                            @endif
                        </td>

                            <td class="text-start">
                            @if ($instructor->fechadn)
                                {{ $instructor->fechadn }}
                            @else
                                <span class="text-muted">No tiene información</span>
                            @endif
                        </td>
                            <td class="text-start">
                            @if ($instructor->tblroles_administrativos_nis)
                                {{ $instructor->tblroles_administrativos_nis }}
                            @else
                                <span class="text-muted">No tiene información</span>
                            @endif
                        </td>
                            <td class="text-start">
                            @if ($instructor->tbltipos_documentos_nis)
                                {{ $instructor->tbltipos_documentos_nis }}
                            @else
                                <span class="text-muted">No tiene información</span>
                            @endif
                        </td>
                               <td class="text-start">
                            @if ($instructor->tbl_eps_nis)
                                {{ $instructor->tbl_eps_nis }}
                            @else
                                <span class="text-muted">No tiene información</span>
                            @endif
                        </td>
                        <td>
                            <div class="acciones justify-content-center">

                                <form action="{{ route('instructores.destroy', $instructor->nis) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-icon btn-eliminar">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>

                                <a href="{{route('instructores.edit', $instructor->nis)}}" 
                                   class="btn btn-warning btn-icon">
                                    <i class="fa-solid fa-pen-clip"></i>
                                </a>

                                <a href="{{route('instructores.show', $instructor->nis)}}" 
                                   class="btn btn-info btn-icon text-white">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-muted py-4">
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

@endsection

@section('js')
<!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection