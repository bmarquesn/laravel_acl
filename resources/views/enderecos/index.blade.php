@extends('layouts.app')
@section('content')
    @component('components.titulos-paginas')
    @slot('titulo_pagina')
        Endereços
    @endslot
    @endcomponent
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br />
    <table class="table table-bordered">
        <tr>
            <th>Empresa</th>
            <th>CEP</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach($enderecos as $endereco)
            <tr>
                <td>{{ $endereco->nomeEmpresa }}</td>
                <td class="cep">{{ $endereco->cep }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('enderecos.show', $endereco->id) }}">Exibir</a>
                @can('empresa-edit')
                    <a class="btn btn-primary" href="{{ route('enderecos.edit', $endereco->id) }}">Editar</a>
                @endcan
                @csrf
                @method('DELETE')
                @can('empresa-delete')
                    {!! Form::open(['method' => 'DELETE', 'route' => ['enderecos.destroy', $endereco->id], 'style' => 'display:inline']) !!}
                    {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endcan
            </td>
            </tr>
        @endforeach
    </table>
    {!! $enderecos->render() !!}
    <p class="text-center text-primary"><small>Tutorial by rscoder.com</small></p>
@endsection
