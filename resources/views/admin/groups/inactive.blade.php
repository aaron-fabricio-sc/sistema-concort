@extends('adminlte::page')

@section('title', 'Lista de grupos')

@section('content_header')
    <h1>Administrador para grupos inactivos.</h1>
@stop

@section('content')
    <h4 class="text-info">Lista de los grupos inactivos</h4>
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

                @include('admin.groups.partials.nav')

                <div class="table-responsive">
                    <table class="table table-striped" id="employees">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>

                                <th>Estado</th>
                                <th class="text-info">Reestablecer</th>







                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataGroup as $group)
                                <tr>
                                    <td>{{ $group->name }}</td>
                                    <td>{{ $group->description }}</td>


                                    <td>
                                        <b class="text-danger">Inactivo</b>
                                    </td>



                                    <td>

                                        <a class="btn btn-info btn-sm m-1"
                                            href="{{ route('admin.groups.activate', $group) }}"><i
                                                class="fas fa-edit"></i></a>

                                    </td>





                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th class="text-info">Reestablecer</th>



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
