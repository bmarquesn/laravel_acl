@extends('layouts.app')
@section('content')
    @component('components.titulos-paginas')
        @slot('titulo_pagina'){{ 'Endereços' }}@endslot
        @slot('name_class'){{ 'Endereco' }}@endslot
        @slot('name_route'){{ 'Enderecos' }}@endslot
    @endcomponent
    <table id="tabela" class="table table-bordered table-striped tablesorter">
        <thead>
            <tr>
                <th>Empresa</th>
                <th>CEP</th>
                <th width="280px">Ação</th>
            </tr>
        </thead>
        <tbody>
        @if(count($enderecos) > 0)
            @foreach($enderecos as $endereco)
                <tr>
                    <td>{{ $endereco->nomeEmpresa }}</td>
                    <td class="cep">{{ $endereco->cep }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('enderecos.show', $endereco->id) }}">Exibir</a>
                    @can('enderecos-edit')
                        <a class="btn btn-primary" href="{{ route('enderecos.edit', $endereco->id) }}">Editar</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('enderecos-delete')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['enderecos.destroy', $endereco->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3"><em>Não há Endereços cadastrados!</em></td>
            </tr>
        @endif
        </tbody>
    </table>
    {!! $enderecos->render() !!}
@endsection
