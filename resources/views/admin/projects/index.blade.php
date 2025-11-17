@extends('adminlte::page')

@section('title', 'Lista de grupos')

@section('content_header')
    <h1>Administrador de proyectos.</h1>
@stop

@section('content')
    <h4 class="text-info">Lista de los proyectos</h4>
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

                @include('admin.projects.partials.nav')

                <div class="table-responsive">
                    <table class="table table-striped" id="employees">
                        <thead>
                            <tr>
                                <th>Nombre de la empresa</th>
                                <th>Nombre del proyecto</th>

                                <th>Fecha de inicio</th>
                                <th>Fecha de fin</th>
                                <th>Estado</th>


                                <th>Monto Invertido Actualmente</th>
                                <th>Inversión Inicial</th>
                                <th>Diferencia de la Inversión</th>
                                <th>Presupuesto</th>





                                <th class="text-success">Enviar Material</th>
                                <th class="text-info">Ver Materiales enviados</th>

                                <th class="text-primary">Descargar Kardex</th>

                                <th class="text-primary">Editar</th>










                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->nombre_empresa }}</td>
                                    <td>{{ $project->nombre_proyecto }}</td>

                                    <td>{{ $project->fecha_inicio }}</td>
                                    <td>{{ $project->fecha_fin }}</td>

                                    <td>{{ $project->estado }}</td>


                                    <td>{{ $project->cantidad_total_precio }} Bs.</td>
                                    <td>{{ $project->presupuesto_inicial }} Bs.</td>

                                    @if ($project->cantidad_total_precio > $project->presupuesto_inicial)
                                        <td class="text-danger">
                                            {{ $project->presupuesto_inicial - $project->cantidad_total_precio }} Bs.
                                        </td>
                                    @else
                                        <td class="text-success">
                                            {{ $project->presupuesto_inicial - $project->cantidad_total_precio }} Bs.
                                        </td>
                                    @endif

                                    @if ($project->presupuesto_inicial > $project->cantidad_total_precio)
                                        <td class="text-success">
                                            Presupuesto no Superado
                                        </td>
                                    @else
                                        <td class="text-danger">
                                            Presupuesto Superado
                                        </td>
                                    @endif

                                    <td>

                                        <a class="btn btn-success btn-sm m-1"
                                            href="{{ route('admin.envios.create', $project) }}"><i
                                                class="fas fa-undo-alt"></i></a>

                                    </td>

                                    <td>

                                        <a class="btn btn-info btn-sm m-1"
                                            href="{{ route('admin.envios.index', $project) }}"><i
                                                class="fas fa-eye"></i></a>

                                    </td>

                                    <td>

                                        <a class="btn btn-success btn-sm m-1"
                                            href="{{ route('admin.projects.pdf.kardex', $project) }}"><i
                                                class="fas fa-file"></i></a>

                                    </td>

                                    <td>

                                        <a class="btn btn-primary btn-sm m-1"
                                            href="{{ route('admin.projects.edit', $project) }}"><i
                                                class="fas fa-edit"></i></a>

                                    </td>



                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>Nombre de la empresa</th>
                                <th>Nombre del proyecto</th>

                                <th>Fecha de inicio</th>
                                <th>Fecha de fin</th>
                                <th>Estado</th>


                                <th>Monto Invertido Actualmente</th>
                                <th>Inversión Inicial</th>

                                <th>Diferencia de la Inversión</th>
                                <th>Presupuesto</th>


                                <th class="text-success">Enviar Material</th>
                                <th class="text-info">Ver Materiales enviados</th>
                                <th class="text-primary">Descargar Kardex</th>

                                <th class="text-primary">Editar</th>










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
