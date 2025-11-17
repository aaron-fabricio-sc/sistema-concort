<div class="form-group">
    {!! Form::label('cod_kardex', ' COD Kardex: ') !!}
    {!! Form::text('cod_kardex', null, [
        'class' => 'form-control w-50',
        'placeholder' => 'ingrese un Nombre de la empresa',
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
