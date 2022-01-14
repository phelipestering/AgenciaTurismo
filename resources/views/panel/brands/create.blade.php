@extends('panel.layouts.app')


@section('content')

    <div class="bred">
        <a href="{{ route('dash.panel') }}" class="bred">Home  ></a>
        <a href="{{ route('brands.index') }}" class="bred">Brands</a>
        <a href="" class="bred">Cadastrar</a>
    </div>


    <div class="title-pg">
        <h1 class="title-pg">Cadastrar Avioes</h1>
    </div>

    <div class="content-din">

    @if (isset($errors) && $errors -> any ())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error )
                    </li>{{ $error }}<li>
                @endforeach
            </ul>
        </div>
    @endif






        <form class="form form-search form-ds" action="{{ route('brands.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <input type="text" name="name" placeholder="Marca" class="form-control">
            </div>

            <div class="form-group">
                <button class="btn btn-search">Cadastrar</button>
            </div>
        </form>

    </div><!--Content Dinâmico-->

@endsection
