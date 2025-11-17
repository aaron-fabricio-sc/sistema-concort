@extends('adminlte::page')

@section('title', 'Eliminar Empleado')

@section('content_header')
    <h1>Administrador de Kardex.</h1>
@stop

@section('content')
    <h4 class="title_view">Eliminar kardex</h4>
    <div class="card fondo-card">
        <div class="card-body">

            @include('admin.groups.partials.nav')

            <div class="card">
                <div class="card-body shadow-lg">
                    <h4 class="text-danger">Esta seguro que desea eliminar el Kardex: </h4>

                    <p class=" text-lg"><b>Codigo: </b> {{ $dataKardex->cod_kardex }}</p>
                    <p class=" text-lg"><b>Empresa a la que pertenece: </b> {{ $dataKardex->project->nombre_empresa }}
                    <p class=" text-lg"><b>Nombre de proyecto: </b> {{ $dataKardex->project->nombre_proyecto }}

                    </p>

                    {!! Form::open(['route' => ['admin.kardex.destroy', $dataKardex], 'method' => 'delete']) !!}


                    <a href="{{ route('admin.kardex.inactivate', $dataKardex) }}" class="btn btn-danger">Eliminar
                    </a>


                    <a href="{{ route('admin.kardex.index') }}" class="btn btn-primary mx-2">Cancelar</a>

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
