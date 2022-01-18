@extends('panel.layouts.app')


@section('content')

    <div class="bred">
        <a href="" class="bred" > Home></a>
        <a href="{{ route('planes.index') }}" class="bred">Avioes</a>
    </div>

    <div class="title-pg">
        <h1 class="title-pg">Lista de Avioes</h1>
    </div>

    <div class="content-din bg-white">

        <div class="form-search">

            {!! Form::open(['route' => 'brands.search', 'class' => 'form form-inline']) !!}

            {!! Form::text('key_search', null, ['class'=>'form-control', 'placeholder'=>'Pesquisar']) !!}

            <button class="btn btn-search">Pesquisar</button>

            {!! Form::close() !!}

            @if (isset($dataform['key_search']))
                <div class="alert alert-info">

                    <a href="{{route('planes.index')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>

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
            <a href="{{ route('planes.create') }}" class="btn-insert">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>Marcas</th>
                <th>Total de Passageiros</th>

                <th width="150">Ações</th>
            </tr>


            {{-- LISTAGEM DE MARCAS --}}


            @forelse ($planes as $plane )

                <tr>
                    <td>{{ $plane->name }}</td>
                    <td>....</td>
                    <td>{{ $plane->qty_passengers }}</td>
                    <td>{{ $plane->name }}</td>
                    <td>{{ $plane->name }}</td>

                    <td>
                        <a href="{{ route('planes.edit', $brand->id) }}" class="edit">Edit</a>
                        <a href="{{ route('planes.show', $brand->id) }}" class="delete">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="200">Nenhum Item Cadastrado</td>
                </tr>
            @endforelse

        </table>

        @if(isset($dataform))

            {!!$planes->appends($dataform)->links()!!}

        @else

            {!!$planes->links()!!}

        @endif


    </div>

@endsection
