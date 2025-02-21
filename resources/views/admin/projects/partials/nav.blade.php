<div class="d-flex p-3 w-100 justify-evenly ">

    <div class="w-50">
        <a class="btn btn-success btn-sm  my-2" href="{{ route('admin.projects.create') }}"> <i class="fas fa-plus"><span
                    class="ml-1">Crear un nuevo
                    Proyecto</span></i></a>
    </div>


    <div class="w-50">
        <a class="btn btn-primary  btn-sm my-2" href="{{ route('admin.projects.index') }}"><i class="fas fa-list-alt"><span
                    class="ml-1">Lista de Proyectos</span></i></a>
    </div>

    <div class="w-50">
        <a class="btn btn-danger btn-sm  my-2" href="{{ route('admin.projects.inactive') }}"><i
                class="fas fa-user-times"><span class="ml-1">Proyectos inactivos</span></i></a>
    </div>

    <div class="w-50">
        <a class="btn btn-info btn-sm  my-2" href="{{ route('admin.projects.pdf.list') }}"><i
                class="fas fa-user-times"><span class="ml-1">Generar Reporte</span></i></a>
    </div>

</div>
