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
    {!! Form::label('cantidad_inicial', 'Catidad Inicial: ') !!}
    {!! Form::number('cantidad_inicial', null, [
        'class' => 'w-50 form-control',
        'placeholder' => 'ingrese una cantidad',
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
