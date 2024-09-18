<div class="form-group">
    {!! Form::label('name', 'Nombre: ') !!}
    {!! Form::text('name', null, [
        'class' => 'form-control w-50',
        'placeholder' => 'ingrese el nombre del departamento',
    ]) !!}

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>



<div class="form-group">
    {!! Form::label('description', 'Descripción: ') !!}
    {!! Form::textarea('description', null, [
        'class' => 'w-50 form-control',
        'placeholder' => 'ingrese una descripción',
    ]) !!}
    @error('description')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
