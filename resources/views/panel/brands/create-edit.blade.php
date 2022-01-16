@extends('panel.layouts.app')


@section('content')

    <div class="bred">
        <a href="{{ route('dash.panel') }}" class="bred">Home  > </a>
        <a href="{{ route('brands.index') }}" class="bred">Brands > </a>
        <a href="{{ route('brands.create') }}" class="bred">Cadastrar</a>
    </div>

    <div class="title-pg">
        <h1 class="title-pg">GESTAO DE AVIOES</h1>
    </div>

    <div class="content-din">

        @if (isset($errors) && $errors -> any ())

        @include('panel.includes.errors')

        @endif

        @if (isset($brand))

            {!! Form::model($brand, ['route' => ['brands.update', $brand->id], 'class' => 'form form-search form-ds', 'method' => 'PUT'])  !!}

            @else

            {!! Form::open(['route' => 'brands.store', 'class' => 'form form-search form-ds']) !!}

        @endif

            <div class= "form-group">

                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}

            </div>

            <div class= "form-group">

                <button class="btn btn-search">Enviar</button>

            </div>

            {!! Form::close() !!}

    </div>

@endsection
