@extends('adminlte::page')
@section('title', 'Home')

@section('content_header')
    <h1>Dashboard</h1>
@endsection


@php

    $user = Auth::user();
    

@endphp

@section('content')


<div class="container-fluid">

    <div class="row">

        <div class="col-lg">

            <p>Hola {{ auth()->user()->name }}!</p>

            <p>{{  Auth::user()->rol}}</p>

        </div>

    </div>

</div>



@if ($usuario->roles_admi->descripcion == 'Instructor')
    <div>
        <div class="alert alert-danger mt-3">
            Bienvenido instructor

        </div>
    </div>
@endif


@if ($usuario->roles_admi->descripcion == 'Aprendiz')
    <div>
        <div class="alert alert-warning mt-3">
            Bienvenido aprendiz

        </div>

        <div>
            <p>{{$usuario->name}}</p>
        </div>
    </div>
@endif


@endsection