<!DOCTYPE html>
@extends('adminlte::page')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@section('title', 'Home')

@section('content')

  <div class="container py-5">

    <div class="card card-custom p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="header-title">Lista de EPS</h2>

            <a href="{{route('eps.create')}}" class="btn btn-primary-custom text-white">
                <i class="fa-solid fa-circle-plus me-2"></i> Crear EPS
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
                        <th>Numero De Documento</th>
                        <th>Denominacion</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($eps as $ep)
                    <tr>
                        <td>{{ $ep->nis }}</td>
                        <td>{{ $ep->numero_documento }}</td>
                        <td class="fw-semibold text-start">{{ $ep->denominacion }}</td>
                        <td class="text-start">
                            @if ($ep->observaciones)
                                {{ $ep->observaciones }}
                            @else
                                <span class="text-muted">No tiene información</span>
                            @endif
                        </td>

                        <td>
                            <div class="acciones justify-content-center">

                                <form action="{{ url('eps.destroy', $ep->nis) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-icon btn-eliminar">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>

                                <a href="{{url('eps.edit', $ep->nis)}}" 
                                   class="btn btn-warning btn-icon">
                                    <i class="fa-solid fa-pen-clip"></i>
                                </a>

                                <a href="{{url('eps.show', $ep->nis)}}" 
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