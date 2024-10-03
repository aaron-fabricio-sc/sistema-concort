@extends('adminlte::page')

@section('title', 'Cormoran')

@section('content_header')
    <h1>Administrador de Grupos</h1>
@stop

@section('content')
    <h4 class="text-info">Editar Grupo.</h4>
    <div class="card fondo-card fondo">


        <div class="card-body overley">

            @include('admin.groups.partials.nav')
            {!! Form::model($group, ['route' => ['admin.groups.update', $group], 'method' => 'put']) !!}

            @include('admin.groups.partials.form')


            <div class="form-group">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
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
