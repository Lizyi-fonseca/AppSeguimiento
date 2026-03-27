<!DOCTYPE html>
@extends('adminlte::page')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@section('title', 'Home')

@section('content')
    <div class="container py-5">
        <div class="card card-custom p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="header-title">
                    <i class="fas fa-users me-2"></i>Lista De Aprendices
                </h2>

                <a href="{{ route('aprendices.create') }}" class="btn btn-primary-custom">
                    <i class="fa-solid fa-circle-plus me-2"></i> Crear Aprendiz
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
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Documento</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Correo Inst.</th>
                            <th>Correo Pers.</th>
                            <th>Sexo</th>
                            <th>F. Nacimiento</th>
                            <th>Tipo Doc.</th>
                            <th>Ficha</th>
                            <th>EPS</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($aprendiz as $aprend)
                            <tr>
                                <td>{{ $aprend->nis }}</td>
                                <td>{{ $aprend->numdoc }}</td>
                                <td>{{ $aprend->nombres }}</td>
                                <td>{{ $aprend->apellidos }}</td>
                                <td>{{ $aprend->direccion }}</td>
                                <td>{{ $aprend->telefono }}</td>
                                <td>{{ $aprend->correoint }}</td>
                                <td>{{ $aprend->correoprs ?: 'No registrado' }}</td>
                                <td>
                                    @if ($aprend->sexo == 1)
                                        Masculino
                                    @elseif($aprend->sexo == 2)
                                        Femenino
                                    @else
                                        Otro
                                    @endif
                                </td>
                                <td>{{ $aprend->fechadn }}</td>
                                <td>{{ $aprend->tiposdocumento->denominacion ?? 'N/A' }}</td>
                                <td>{{ $aprend->ficha->denominacion ?? 'N/A' }}</td>
                                <td>{{ $aprend->eps->denominacion ?? 'N/A' }}</td>
                                <td>
                                    <div class="acciones">
                                        <form action="{{ route('aprendices.destroy', $aprend->nis) }}" method="POST"
                                            class="form-eliminar">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-icon btn-eliminar"
                                                data-nis="{{ $aprend->nis }}">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('aprendices.edit', $aprend->nis) }}"
                                            class="btn btn-warning btn-icon">
                                            <i class="fa-solid fa-pen-clip"></i>
                                        </a>

                                        <a href="{{ route('aprendices.show', $aprend->nis) }}"
                                            class="btn btn-info btn-icon text-white">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="14" class="text-center text-muted py-4">
                                    <i class="fas fa-info-circle me-2"></i>No hay aprendices registrados
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
                    const nis = this.getAttribute('data-nis');

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
