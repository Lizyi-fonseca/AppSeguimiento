@extends('adminlte::page')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@section('title', 'Home')

@section('content_header')
    <h1>Dashboard</h1>
@endsection

@php
    
    $user = Auth::user();


@endphp


@section('content')

    <div class="container">

        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">Hola</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}<svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>

                            </div>
                        @endif

                        Estas logueado  <span class="text-primary">{{ $user->name }} 
                            </span> <span> Tu rol es </span> <span class="text-success">{{ $user->roles_admi->descripcion }}</span>
                         
                            @can('ver-perfil')
                                 <p>{{ $user->aprendiz->nombres ?? '' }}</p>
                                 <p>{{ $user->aprendiz->correoint }}</p>
                            @endcan
                           
                        </div>


                </div>
            </div>
        </div>

        <div class="text-center mb-5">
            <h1 class="fw-bold text-primary">Panel Administrativo</h1>
            <p class="text-muted">Sistema de Gestión</p>
        </div>

        @can('es-instructor')
            <div class="row g-4">

            <!-- Programas -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Bitacoras</h5>
                        <a href="" class="btn btn-primary w-100">
                            Ir a Bitacoras
                        </a>
                    </div>
                </div>
            </div>
            </div>
        @endcan
        

        @can('es-administrador')
             <div class="row g-4">

            <!-- Programas -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Programas de Formación</h5>
                        <a href="{{ route('programas.index') }}" class="btn btn-primary w-100">
                            Ir a Programas
                        </a>
                    </div>
                </div>
            </div>

            <!-- Roles -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Roles Administrativos</h5>
                        <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-primary w-100">
                            Ver Roles
                        </a>
                    </div>
                </div>
            </div>

            <!-- EPS -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <h5 class="card-title">EPS</h5>
                        <a href="{{ route('eps.index') }}" class="btn btn-primary w-100">
                            Ver EPS
                        </a>
                    </div>
                </div>
            </div>

            <!-- Regionales -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Regionales</h5>
                        <a href="{{ route('regionales.index') }}" class="btn btn-primary w-100">
                            Ver Regionales
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tipos Documento -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Tipos de Documentos</h5>
                        <a href="{{ route('tipodocumento.index') }}" class="btn btn-primary w-100">
                            Ver Tipos
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bitácoras -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Bitácoras</h5>
                        <a href="{{ url('bitacora') }}" class="btn btn-primary w-100">
                            Ver Bitácoras
                        </a>
                    </div>
                </div>
            </div>

            <!-- Alternativas -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Alternativas</h5>
                        <a href="{{ route('alternativas.index') }}" class="btn btn-primary w-100">
                            Ver Alternativas
                        </a>
                    </div>
                </div>
            </div>

            <!-- Aprendices -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Aprendices</h5>
                        <a href="{{ url('aprendices') }}" class="btn btn-primary w-100">
                            Ver Aprendices
                        </a>
                    </div>
                </div>
            </div>

            <!-- Centros -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Centros de Formación</h5>
                        <a href="{{ url('centroformacion') }}" class="btn btn-primary w-100">
                            Ver Centros
                        </a>
                    </div>
                </div>
            </div>

            <!-- Ente -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Ente Coformador</h5>
                        <a href="{{ url('entecoformador') }}" class="btn btn-primary w-100">
                            Ver Ente
                        </a>
                    </div>
                </div>
            </div>

            <!-- Fichas -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Fichas de Caracterización</h5>
                        <a href="{{ url('fichascaracterizacion') }}" class="btn btn-primary w-100">
                            Ver Fichas
                        </a>
                    </div>
                </div>
            </div>

            <!-- Instructores -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Instructores</h5>
                        <a href="{{ url('Instructor') }}" class="btn btn-primary w-100">
                            Ver Instructores
                        </a>
                    </div>
                </div>
            </div>

        </div>
        @endcan
       

    </div>

@endsection

