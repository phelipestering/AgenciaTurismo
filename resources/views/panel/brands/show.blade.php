@extends('panel.layouts.app')


@section('content')

    <div class="bred">
        <a href="{{ route('dash.panel') }}" class="bred">Home  > </a>
        <a href="{{ route('brands.index') }}" class="bred">Brands > </a>
        <a href="" class="bred">{{ $brand->name }}</a>
    </div>

    <div class="title-pg">
        <h1 class="title-pg">{{ $brand->name }}</h1>
    </div>

    <div class="content-din">

        <ul>
            <li>
                Nome: <strong>{{ $brand->name }}</strong>
            </li>
        </ul>

        <div class = "messages">
            @include('panel.includes.alerts')
         </div>

            {!! Form::open(['route' => ['brands.destroy', $brand->id], 'class' => 'form form-search form-ds', 'method'=> 'DELETE']) !!}

            <div class= "form-group">

                <button class="btn btn-danger">Deletar a marca {{ $brand->name  }}</button>

            </div>

            {!! Form::close() !!}

    </div>

@endsection
