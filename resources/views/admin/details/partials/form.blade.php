<div class="form-group">
    {!! Form::label('article_id', 'Artículo: ') !!}

    {!! Form::select('article_id', $articles, null, ['class' => 'w-50 form-control']) !!}
    @error('article_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('cantidad', 'Catidad: ') !!}
    {!! Form::number('cantidad', null, [
        'class' => 'w-50 form-control',
        'placeholder' => 'ingrese una cantidad',
    ]) !!}
    @error('cantidad')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>





<div class="form-group">
    {!! Form::label('Detalles del envio', 'Detalles: ') !!}
    {!! Form::textarea('detalle', null, [
        'class' => 'w-50 form-control',
        'placeholder' => 'ingrese una descripción',
    ]) !!}
    @error('detalle')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
