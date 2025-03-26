<div class="d-flex p-3 w-100 justify-evenly ">



    <div class="w-50">
        <a class="btn btn-primary  btn-sm my-2" href="{{ route('admin.projects.index') }}"><i class="fas fa-list-alt"><span
                    class="ml-1">Lista de proyectos</span></i></a>
    </div>


    <div class="w-50">
        <a class="btn btn-info btn-sm  my-2" href="{{ route('admin.envios.pdf.list', $project_id) }}"><i
                class="fas fa-user-times"><span class="ml-1">Generar Reporte </span></i></a>
    </div>

</div>
