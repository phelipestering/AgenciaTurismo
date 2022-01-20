{{--NUMERO DE PASSAGEIROS--}}

<div class= "form-group">

    <label for="qty_passengers">Quantidade de Passageiros</label>

    {!! Form::number('qty_passengers', null, ['class' => 'form-control', 'placeholder' => 'Quant de Passageiros']) !!}

</div>

{{--SELECAO DAS CLASSES--}}

<div class= "form-group">

    <label for="class">Classe</label>

    {!! Form::select('class', $classes, null, ['class' => 'form-control']) !!}

</div>

{{--SELECAO DAS MARCAS DE AVIOES--}}

<div class= "form-group">

    <label for="brand_id">Marcas</label>

    {!! Form::select('brand_id', $brands, null, ['class' => 'form-control']) !!}

</div>

<div class= "form-group">

    <button class="btn btn-search">Enviar</button>

</div>
