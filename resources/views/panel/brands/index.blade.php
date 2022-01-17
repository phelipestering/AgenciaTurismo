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

            @if (isset($dataform['key_search']))
                <div class="alert alert-info">

                    <p>Resultados para: <strong>{{ $dataform['key_search'] }}</strong></p>

                </div>


            @endif


        </div>

        {{--
            EXIBINDO A JANELA DE MENSAGEM DE ERRO E SUCESSO

            as mensagens estao contidas no brand controller metodo STORE

                --}}
        <div class = "messages">

            @include('panel.includes.alerts')

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
                        <a href="{{ route('brands.show', $brand->id) }}" class="delete">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="200">Nenhum Item Cadastrado</td>
                </tr>
            @endforelse
        </table>

        @if (isset($dataform))

        {!! $brands->appends($dataform)->links()!!}

        @else

        {!!$brands->links()!!}

        @endif


    </div>

@endsection
