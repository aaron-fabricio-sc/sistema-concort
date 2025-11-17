<div class="d-flex p-3 w-100 justify-evenly ">

    <div class="w-50">
        <a class="btn btn-success btn-sm  my-2" href="{{ route('admin.kardex.create') }}"> <i class="fas fa-plus"><span
                    class="ml-1">Crear un nuevo
                    Kardex</span></i></a>
    </div>


    <div class="w-50">
        <a class="btn btn-primary  btn-sm my-2" href="{{ route('admin.kardex.index') }}"><i class="fas fa-list-alt"><span
                    class="ml-1">Lista de Kardex</span></i></a>
    </div>

    <div class="w-50">
        <a class="btn btn-danger btn-sm  my-2" href="{{ route('admin.kardex.inactive') }}"><i
                class="fas fa-user-times"><span class="ml-1">Materiales inactivos</span></i></a>
    </div>



</div>
