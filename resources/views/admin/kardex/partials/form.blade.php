<div class="form-group">
    {!! Form::label('cod_kardex', ' COD Kardex: ') !!}
    {!! Form::text('cod_kardex', null, [
        'class' => 'form-control w-50',
        'placeholder' => 'Ingrese un código o un nombre',
    ]) !!}

    @error('cod_kardex')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


<div class="form-group">
    {!! Form::label('project_id', 'Asignar Proyecto ') !!}

    {!! Form::select('project_id', $project, null, ['class' => 'w-50 form-control']) !!}
    @error('project_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>
