@extends('adminlte::page')

@section('title', 'Cormoran')

@section('content_header')
    <h1>Administrador de Artículos</h1>
@stop

@section('content')
    <h4 class="text-info">Editar el Artículo.</h4>
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
            {!! Form::model($article, ['route' => ['admin.articles.update', $article], 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre: ') !!}
                {!! Form::text('nombre', null, [
                    'class' => 'form-control w-50',
                    'placeholder' => 'ingrese el nombre del departamento',
                ]) !!}

                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                {!! Form::label('cod', 'Código: ') !!}
                {!! Form::text('cod', null, [
                    'class' => 'w-50 form-control',
                    'placeholder' => 'ingrese un código',
                ]) !!}
                @error('cod')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- 
            <div class="form-group">
                {!! Form::label('cantidad_inicial', 'Catidad Inicial: ') !!}
                {!! Form::number('cantidad_inicial', null, [
                    'class' => 'w-50 form-control',
                    'placeholder' => 'ingrese un código',
                ]) !!}
                @error('cantidad_inicial')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

 --}}

            <div class="form-group">
                {!! Form::label('precio_unitario', 'Precio Unitario: ') !!}
                {!! Form::number('precio_unitario', null, [
                    'class' => 'w-50 form-control',
                    'placeholder' => 'Precio unitario',
                    'step' => '0.01',
                ]) !!}
                @error('precio_unitario')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('group_id', 'Grupo al que pertenece: ') !!}

                {!! Form::select('group_id', $group, null, ['class' => 'w-50 form-control']) !!}
                @error('group_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group">
                {!! Form::label('descripcion', 'Descripción: ') !!}
                {!! Form::textarea('descripcion', null, [
                    'class' => 'w-50 form-control',
                    'placeholder' => 'ingrese una descripción',
                ]) !!}
                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



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
