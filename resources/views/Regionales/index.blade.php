<!DOCTYPE html>
@extends('adminlte::page')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@section('title', 'Home')

@section('content')

    <div class="container py-5">

        <div class="card card-custom">

            <div class="card-header header-custom">
                <h4 class="mb-0 title-text">Listado De Regionales</h4>
            </div>

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h5 class="mb-0 fw-semibold text-secondary">
                        Gestión De Regionales
                    </h5>

                    <a href="{{ route('regionales.create') }}" class="btn btn-primary-custom text-white px-3">
                        <i class="fa-solid fa-circle-plus me-2"></i>
                        Crear Regional
                    </a>

                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('error'))
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

                                    <td>

                                        <div class="acciones">

                                            <a href="{{ route('regionales.show', $regional->nis) }}"
                                                class="btn btn-info btn-icon text-white"
                                                title="Ver">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="{{ route('regionales.edit', $regional->nis) }}"
                                                class="btn btn-warning btn-icon"
                                                title="Editar">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>

                                            <form action="{{ route('regionales.destroy', $regional->nis) }}" method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button type="button"
                                                    class="btn btn-danger btn-icon btn-eliminar"
                                                    title="Eliminar">

                                                    <i class="fa-solid fa-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center text-muted py-4">
                                        No hay información registrada
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

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
@endsection

@section('js')
<!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection