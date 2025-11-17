<div class="form-group">
    {!! Form::label('article_id', 'Materiales: ') !!}
    {!! Form::select('article_id', $articles, null, ['class' => 'w-50 form-control']) !!}
    @error('article_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">

    {!! Form::hidden('project_id', $project_id, ['class' => 'w-50 form-control']) !!}

</div>




<div class="form-group">
    {!! Form::label('cantidad', 'Cantidad del envio: ') !!}
    {!! Form::text('cantidad', null, [
        'class' => 'form-control w-50',
        'placeholder' => 'ingrese la cantidad',
    ]) !!}

    @error('cantidad')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


<div class="form-group">

    {!! Form::hidden('project_id', $project_id, ['class' => 'w-50 form-control']) !!}

</div>
