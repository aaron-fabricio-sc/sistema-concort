<div class="form-group">
    {!! Form::label('nombre_empresa', 'Nombre de la empresa: ') !!}
    {!! Form::text('nombre_empresa', null, [
        'class' => 'form-control w-50',
        'placeholder' => 'ingrese un Nombre de la empresa',
    ]) !!}

    @error('nombre_empresa')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('nombre_proyecto', 'Nombre del proyecto: ') !!}
    {!! Form::text('nombre_proyecto', null, [
        'class' => 'form-control w-50',
        'placeholder' => 'ingrese un Nombre del proyecto',
    ]) !!}

    @error('nombre_proyecto')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('fecha_inicio', 'Fecha de inicio: ') !!}
    {!! Form::date('fecha_inicio', null, [
        'class' => 'w-50 form-control',
        'placeholder' => 'ingrese la fecha de inicio',
    ]) !!}
    @error('fecha_inicio')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('fecha_fin', 'Fecha final: ') !!}
    {!! Form::date('fecha_fin', null, [
        'class' => 'w-50 form-control',
        'placeholder' => 'ingrese la fecha final',
    ]) !!}
    @error('fecha_fin')
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
