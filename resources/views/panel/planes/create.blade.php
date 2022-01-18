@extends('panel.layouts.app')


@section('content')

    <div class="bred">
        <a href="{{ route('dash.panel') }}" class="bred"> Home  > </a>
        <a href="{{ route('planes.index') }}" class="bred"> Avioes > </a>
        <a href="" class="bred"> Cadastrar</a>
    </div>

    <div class="title-pg">
        <h1 class="title-pg">CADASTRAR AVIAO</h1>
    </div>

    <div class="content-din">

        @include('panel.includes.errors')

        {!! Form::open(['route' => 'brands.store', 'class' => 'form form-search form-ds']) !!}

        @include('panel.planes.form')

        {!! Form::close() !!}

    </div>

@endsection
