<div class="d-flex p-3 w-100 justify-evenly ">

    <div class="w-50">
        <a class="btn btn-success btn-sm  my-2" href="{{ route('admin.groups.create') }}"> <i class="fas fa-plus"><span
                    class="ml-1">Crear un nuevo
                    Grupo</span></i></a>
    </div>


    <div class="w-50">
        <a class="btn btn-primary btn-sm  my-2" href="{{ route('admin.groups.index') }}"><i class="fas fa-list-alt"><span
                    class="ml-1">Lista de Grupos</span></i></a>
    </div>

    <div class="w-50">
        <a class="btn btn-danger btn-sm  my-2" href="{{ route('admin.groups.inactive') }}"><i
                class="fas fa-user-times"><span class="ml-1">Grupos inactivos</span></i></a>
    </div>


    <div class="w-50">
        <a class="btn btn-info btn-sm  my-2" href="{{ route('admin.groups.pdf.list') }}"><i
                class="fas fa-user-times"><span class="ml-1">Generar Reporte</span></i></a>
    </div>
</div>
