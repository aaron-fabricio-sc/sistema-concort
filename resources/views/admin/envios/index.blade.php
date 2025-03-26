@extends('adminlte::page')

@section('title', 'Cormoran')

@section('content_header')
    <h1>Administrador de envios.</h1>
@stop

@section('content')
    <h4 class="text-info">Lista de envios de materiales de {{ $project->nombre_proyecto }}</h4>
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

                <div class="d-flex p-3 w-100 justify-evenly ">



                    <div class="w-50">
                        <a class="btn btn-primary  btn-sm my-2" href="{{ route('admin.projects.index') }}"><i
                                class="fas fa-list-alt"><span class="ml-1">Lista de proyectos</span></i></a>
                    </div>


                    <div class="w-50">
                        <a class="btn btn-info btn-sm  my-2" href="{{ route('admin.envios.pdf.list', $project->id) }}"><i
                                class="fas fa-user-times"><span class="ml-1">Generar Reporte de Envíos</span></i></a>
                    </div>

                </div>


                <div class="table-responsive">
                    <table class="table table-striped" id="employees">
                        <thead>
                            <tr>
                                <th>ID</th>

                                <th>Nombre del articulo</th>
                                <th>Cantidad</th>
                                <th>Precio</th>

                                <th>Fecha de envio</th>



                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($envios as $envio)
                                <tr>
                                    <td>{{ $envio->id }}</td>

                                    <td>{{ $envio->article->nombre }}</td>
                                    <td>{{ $envio->cantidad }}</td>
                                    <td>{{ $envio->monto }}</td>


                                    @php
                                        $date = $envio->created_at;

                                        $newDateActive = date('d-m-Y', strtotime($date));

                                    @endphp

                                    <td class="dates">{{ $newDateActive }}</td>








                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>ID</th>

                                <th>Nombre del articulo</th>
                                <th>Cantidad</th>
                                <th>Precio</th>

                                <th>Fecha de envio</th>








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
