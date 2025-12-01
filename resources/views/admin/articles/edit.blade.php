@extends('adminlte::page')

@section('title', 'Cormoran')

@section('content_header')
    <h1>Administrador para materiales.</h1>
@stop

@section('content')
    <h4 class="text-info">Editar Materiales.</h4>
    <div class="card fondo-card fondo">
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

        <div class="card-body overley">
            @include('admin.articles.partials.nav')
            {!! Form::model($article, ['route' => ['admin.articles.updateCantidad', $article], 'method' => 'put']) !!}

            <h3>
                Actualizar Cantidad de Material
            </h3>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; align-items: center;">
                <div class="form-group">
                    {!! Form::label('cantidad_actual', 'Cantidad Actual En almacén: ') !!}
                    {!! Form::number('cantidad_actual', null, [
                        'class' => 'w-100 form-control',
                        'placeholder' => 'Cantidad actual',
                        'disabled' => 'true',
                        'id' => 'cantidad_actual',
                    ]) !!}
                    @error('cantidad_actual')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('agregar_cantidad', 'Agregar Cantidad: ') !!}
                    {!! Form::number('agregar_cantidad', null, [
                        'class' => 'w-100 form-control',
                        'placeholder' => 'Agregar cantidad',
                        'id' => 'agregar_cantidad',
                    ]) !!}
                    @error('agregar_cantidad')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('nueva_cantidad', 'Nueva Cantidad: ') !!}
                    {!! Form::number('nueva_cantidad', null, [
                        'class' => 'w-100 form-control',
                        'placeholder' => 'Nueva cantidad',
                        'disabled' => 'true',
                        'id' => 'nueva_cantidad',
                    ]) !!}
                    @error('nueva_cantidad')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('kardex_id', 'En caso de que sea Solicitud selecciona un Kardex:') !!}

                    {!! Form::select(
                        'kardex_id',
                        ['' => 'Sin Kardex'] + $kardex->toArray(), // 👈 convierte a array aquí
                        null,
                        ['class' => 'w-50 form-control'],
                    ) !!}

                    @error('kardex_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('proveedor', 'Proveedor: ') !!}
                    {!! Form::text('proveedor', null, [
                        'class' => 'w-100 form-control',
                        'placeholder' => 'Agregar proveedor',
                        'id' => 'proveedor',
                    ]) !!}
                    @error('proveedor')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::submit('Actualizar Cantidad', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>


            {!! Form::close() !!}


            {!! Form::model($article, ['route' => ['admin.articles.update', $article], 'method' => 'put']) !!}
            <h3>
                Actualizar Datos
            </h3>
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre: ') !!}
                {!! Form::text('nombre', null, [
                    'class' => 'form-control w-50',
                    'placeholder' => 'ingrese un nombre',
                ]) !!}

                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('tipo_medida', 'Tipo de medida: ') !!}
                {!! Form::select('tipo_medida', $medidas, null, ['class' => 'w-50 form-control']) !!}
                @error('tipo_medida')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('cod', 'Código: ') !!}
                {!! Form::text('cod', null, [
                    'class' => 'w-50 form-control',
                    'placeholder' => 'ingrese un código',
                ]) !!}
                @error('cod')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>





            <div class="form-group">
                {!! Form::label('precio_unitario', 'Precio Unitario: ') !!}
                {!! Form::number('precio_unitario', null, [
                    'class' => 'w-50 form-control',
                    'placeholder' => 'Precio unitario',
                    'step' => '0.01',
                ]) !!}
                @error('precio_unitario')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('group_id', 'Grupo al que pertenece: ') !!}

                {!! Form::select('group_id', $group, null, ['class' => 'w-50 form-control']) !!}
                @error('group_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group">
                {!! Form::label('descripcion', 'Descripción: ') !!}
                {!! Form::textarea('descripcion', null, [
                    'class' => 'w-50 form-control',
                    'placeholder' => 'ingrese una descripción',
                ]) !!}
                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



            <div class="form-group">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}


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


            // Función para actualizar la nueva cantidad
            function updateNuevaCantidad() {
                var cantidadActual = parseFloat($('#cantidad_actual').val()) || 0;
                var agregarCantidad = parseFloat($('#agregar_cantidad').val()) || 0;
                var nuevaCantidad = cantidadActual + agregarCantidad;
                $('#nueva_cantidad').val(nuevaCantidad);
            }

            // Escuchar cambios en los inputs
            $('#agregar_cantidad').on('input', function() {
                updateNuevaCantidad();
            });

            // Inicializar la nueva cantidad al cargar la página
            updateNuevaCantidad();
        });
    </script>
@stop
