@extends('adminlte::page')

@section('title', 'Cormoran')

@section('content_header')
    <h1>Administrador de Artículos</h1>
@stop

@section('content')
    <h4 class="text-info">Crear un nuevo Articulo.</h4>
    <div class="card fondo-card fondo">
        @if (session('message'))
            <div class="alert alert-success">
                <strong>{{ session('message') }}</strong>
            </div>
        @endif
        @if (session('message-danger'))
            <div class="alert alert-danger">
                <strong>{{ session('message-danger') }}</strong>
            </div>
        @endif

        <div class="card-body overley">

            @include('admin.articles.partials.nav')
            {!! Form::open(['route' => 'admin.articles.store']) !!}

            @include('admin.articles.partials.form')


            <div class="form-group">
                {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}


        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop
