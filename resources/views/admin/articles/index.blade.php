@extends('adminlte::page')

@section('title', 'Lista de grupos')

@section('content_header')
    <h1>Administrador para Articulos.</h1>
@stop

@section('content')
    <h4 class="text-info">Lista de los articulos</h4>
    {{-- 
 @livewire('employee.employee-index')
 --}}

    <div class="card fondo">
        <div class="overley">
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

            <div class="card-blue">

                @include('admin.articles.partials.nav')

                <div class="table-responsive">
                    <table class="table table-striped" id="employees">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Cod</th>

                                <th>Cantidad Inicial</th>

                                <th>Cantidad Actual</th>
                                <th>Precio Unitario</th>

                                <th>Valor Total</th>

                                <th>Grupo</th>




                                <th>Estado</th>
                                <th class="text-info">Ver más</th>


                                <th class="text-primary">Editar</th>


                                <th class="text-danger">Eliminar</th>







                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataArticle as $article)
                                <tr>
                                    <td>{{ $article->nombre }}</td>
                                    <td>{{ $article->descripcion }}</td>

                                    <td>{{ $article->cod }}</td>

                                    <td>{{ $article->cantidad_inicial }}</td>

                                    <td>{{ $article->cantidad_actual }}</td>

                                    <td>{{ $article->precio_unitario }}</td>
                                    <td>{{ $article->valor_total }}</td>
                                    <td>{{ $article->group->name }}</td>


                                    <td>
                                        <b class="text-success">Activo</b>
                                    </td>



                                    <td>

                                        <a class="btn btn-info btn-sm m-1"
                                            href="{{ route('admin.groups.show', $article) }}"><i
                                                class="fas fa-edit"></i></a>

                                    </td>


                                    <td>

                                        <a class="btn btn-primary btn-sm m-1"
                                            href="{{ route('admin.groups.edit', $article) }}"><i
                                                class="fas fa-edit"></i></a>

                                    </td>

                                    <td>

                                        <a href="{{ route('admin.groups.viewConfirmDelete', $article->id) }}"
                                            class="btn btn-danger btn-sm  m-1"> <i class="fas fa-trash-alt"></i> </a>

                                    </td>


                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Cod</th>

                                <th>Cantidad Inicial</th>

                                <th>Cantidad Actual</th>
                                <th>Precio Unitario</th>

                                <th>Valor Total</th>

                                <th>Grupo</th>




                                <th>Estado</th>
                                <th class="text-info">Ver más</th>


                                <th class="text-primary">Editar</th>


                                <th class="text-danger">Eliminar</th>



                            </tr>
                        </tfoot>
                    </table>
                </div>



            </div>
        </div>

    </div>


@stop

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

@stop

@section('js')



    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"></script>

    <script>
        var table = new DataTable('#employees', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
            },
            responsive: true,
            autoWidth: false,

        });
    </script>



@stop
