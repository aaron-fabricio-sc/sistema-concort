@extends('adminlte::page')

@section('title', 'Cormoran')

@section('content_header')
    <h1>Administrador de los Artículos.</h1>
@stop

@section('content')
    <h4 class="text-info">Detalles del Artículo {{ $article->name }}</h4>
    <div class="card fondo">
        <div class="overley ">
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
            @include('admin.articles.partials.nav')
            <div class="container pt-3">

                <div class="row">
                    <div class="col-md-3">
                        <h4 class="text-primary">Nombre del artículo:
                        </h4>
                        <h5 class="text-secondary ">
                            {{ $article->nombre }}</h5>

                    </div>
                    <div class="col-md-3 p-2 justify-items-center">
                        <h4 class="text-primary">Descripción:
                        </h4>
                        <h5 class="text-secondary">
                            {{ $article->descripcion }}</h5>

                    </div>
                    <div class="col-md-3 p-2 justify-items-center">
                        <h4 class="text-primary">Código:
                        </h4>

                        <h5 class="text-secondary">
                            {{ $article->cod }}</h5>
                    </div>


                    <div class="col-md-3 p-2 justify-items-center">
                        <h4 class="text-primary">Cantidad Inicial:
                        </h4>
                        <h5 class="text-secondary">
                            {{ $article->cantidad_inicial }}</h5>

                    </div>



                    <div class="col-md-3 p-2 justify-items-center">
                        <h4 class="text-primary">Cantidad Actual:
                        </h4>
                        <h5 class="text-secondary">
                            {{ $article->cantidad_actual }}</h5>

                    </div>


                    <div class="col-md-3 p-2 justify-items-center">
                        <h4 class="text-primary">Precio Unitario:
                        </h4>
                        <h5 class="text-secondary">
                            {{ $article->precio_unitario }}</h5>

                    </div>


                    <div class="col-md-3 p-2 justify-items-center">
                        <h4 class="text-primary">Valor Total:
                        </h4>
                        <h5 class="text-secondary">
                            {{ $article->valor_total }}</h5>

                    </div>


                    <div class="col-md-3 p-2 justify-items-center">
                        <h4 class="text-primary">Grupo al que pertenece:
                        </h4>
                        <h5 class="text-secondary">
                            {{ $article->group->name }}</h5>

                    </div>

                    <div class="col-md-3 p-2 justify-items-center">
                        <h4 class="text-primary">Estado:
                        </h4>


                        @if ($article->status == 1)
                            <h5 class="text-success"> Activo </h5>
                        @else
                            <h5 class="text-danger"> Inactivo </h5>
                        @endif



                    </div>

                </div>




                {{--       <div>
                    @if ($employee->cv !== null)
                        <a href="/archivos/{{ $employee->cv }}" target="blank_" class="btn btn-secondary mx-1">PDF</a>
                    @endif



                    <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-primary mx-1">Editar</a>

                    @can('admin.employees.viewConfirmDelete')
                        <a href="{{ route('admin.employees.viewConfirmDelete', $employee) }}"
                            class="btn btn-danger mx-1">Eliminar</a>
                    @endcan


                    @can('admin.employees.viewAssignUser')
                        <a href="{{ route('admin.employees.viewAssignUser', $employee) }}"
                            class="btn btn-warning mx-1">Assignar
                            Usuario</a>
                    @endcan

                    @can('admin.employees.viewAssignUser')
                        <a target="blank_" href="{{ route('admin.employees.viewPfdEmployee', $employee) }}"
                            class="btn btn-warning mx-1">Descargar Perfil</a>
                    @endcan

                    @can('admin.employees.viewAssignUser')
                        <a target="blank_" href="{{ route('admin.employees.viewVacations', $employee) }}"
                            class="btn btn-warning mx-1">Vacaciones</a>
                    @endcan


                </div>
 --}}
            </div>
        </div>
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    @stop

    @section('js')

    @stop
