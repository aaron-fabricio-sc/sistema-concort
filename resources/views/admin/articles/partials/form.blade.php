<div class="form-group">
    {!! Form::label('nombre', 'Nombre: ') !!}
    {!! Form::text('nombre', null, [
        'class' => 'form-control w-50',
        'placeholder' => 'ingrese el nombre del departamento',
    ]) !!}

    @error('nombre')
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
    {!! Form::label('cantidad_inicial', 'Catidad Inicial: ') !!}
    {!! Form::number('cantidad_inicial', null, [
        'class' => 'w-50 form-control',
        'placeholder' => 'ingrese un código',
    ]) !!}
    @error('cantidad_inicial')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>



<div class="form-group">
    {!! Form::label('precio_unitario', 'Precio Unitario: ') !!}
    {!! Form::number('precio_unitario', null, [
        'class' => 'w-50 form-control',
        'placeholder' => 'Precio unitario',
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
