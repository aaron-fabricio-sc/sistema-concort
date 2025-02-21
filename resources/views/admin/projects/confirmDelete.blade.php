@extends('adminlte::page')

@section('title', 'Eliminar Empleado')

@section('content_header')
    <h1>Administrador de los proyectos.</h1>
@stop

@section('content')
    <h4 class="title_view text-danger">Eliminar el proyecto.</h4>
    <div class="card fondo-card">
        <div class="card-body">

            @include('admin.projects.partials.nav')

            <div class="card">
                <div class="card-body shadow-lg">
                    <h4 class="text-danger">Esta seguro que desea eliminar el Proyecto: </h4>

                    <p class=" text-lg"><b>Nombre: </b> {{ $project->nombre_proyecto }}</p>
                    <p class=" text-lg"><b>Descripción: </b> {{ $project->descripcion }}
                    </p>

                    {!! Form::open(['route' => ['admin.projects.destroy', $project], 'method' => 'delete']) !!}


                    <a href="{{ route('admin.projects.inactivate', $project) }}" class="btn btn-danger">Eliminar
                    </a>


                    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary mx-2">Cancelar</a>

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
