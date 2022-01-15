@extends('panel.layouts.app')


@section('content')

    <div class="bred">
        <a href="" class="bred">Home  ></a>
        <a href="" class="bred">Brands</a>
    </div>

    <div class="title-pg">
        <h1 class="title-pg">Marcas de Aviao</h1>
    </div>

    <div class="content-din bg-white">

        <div class="form-search">

            {!! Form::open(['route' => 'brands.search', 'class' => 'form form-inline']) !!}

            {!! Form::text('key_search', null, ['class'=>'form-control', 'placeholder'=>'Pesquisar']) !!}

            <button class="btn btn-search">Pesquisar</button>

            {!! Form::close() !!}

        </div>

        {{--
            EXIBINDO A JANELA DE MENSAGEM DE ERRO E SUCESSO

            as mensagens estao contidas no brand controller metodo STORE

                --}}
        <div class = "messages">
            @if (session('sucess'))
                <div class = "alert alert-success">
                    {{ session('sucess') }}
                </div>
            @endif
        </div>

        <div class = "messages">
            @if (session('error'))
                <div class = "alert alert-error">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <div class="class-btn-insert">
            <a href="{{ route('brands.create') }}" class="btn-insert">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

        <table class="table table-striped">
            <tr>
                <th>Nome</th>

                <th width="150">Ações</th>
            </tr>


            {{-- LISTAGEM DE MARCAS --}}


            @forelse ($brands as $brand )

                <tr>
                    <td>{{ $brand->name }}</td>

                    <td>
                        <a href="{{ route('brands.edit', $brand->id) }}" class="edit">Edit</a>
                        <a href="" class="delete">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="200">Nenhum Item Cadastrado</td>
                </tr>
            @endforelse
        </table>

        {{ $brands->links() }}

    </div>

@endsection
