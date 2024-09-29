@extends('adminlte::page')

@section('title', 'Eliminar Empleado')

@section('content_header')
    <h1>Administrador de los Artículos.</h1>
@stop

@section('content')
    <h4 class="title_view">Eliminar el Artículo</h4>
    <div class="card fondo-card">
        <div class="card-body">

            @include('admin.articles.partials.nav')

            <div class="card">
                <div class="card-body shadow-lg">
                    <h4 class="text-danger">Esta seguro que desea eliminar el Artículo: </h4>

                    <p class=" text-lg"><b>Nombre: </b> {{ $article->nombre }}</p>
                    <p class=" text-lg"><b>Descripción: </b> {{ $article->descripcion }}
                    </p>

                    {!! Form::open(['route' => ['admin.articles.destroy', $article], 'method' => 'delete']) !!}


                    <a href="{{ route('admin.articles.inactivate', $article) }}" class="btn btn-danger">Eliminar
                    </a>


                    <a href="{{ route('admin.articles.index') }}" class="btn btn-primary mx-2">Cancelar</a>

                    {{-- 
                    {!! Form::submit('Eliminar Permanentemente', ['class' => 'btn btn-danger']) !!}


                    {!! Form::close() !!} --}}


                </div>
            </div>
        </div>




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
