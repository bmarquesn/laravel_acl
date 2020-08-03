@extends('layouts.app')
@section('content')
    @component('components.titulos-paginas')
        @slot('titulo_pagina'){{ 'Empresas' }}@endslot
        @slot('name_class'){{ 'Empresa' }}@endslot
        @slot('name_route'){{ 'Empresas' }}@endslot
    @endcomponent
    <table id="tabela" class="table table-bordered table-striped tablesorter">
        <thead>
            <tr>
                <th>Vínculo Usuário</th>
                <th>Razão Social</th>
                <th>Nome Fantasia</th>
                <th>CNPJ</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        @if(count($empresas) > 0)
            @foreach($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->nomeUsuario }}</td>
                    <td>{{ $empresa->razao_social }}</td>
                    <td>{{ $empresa->nome_fantasia }}</td>
                    <td>{{ $empresa->cnpj }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('empresas.show', $empresa->id) }}">Exibir</a>
                        @can('empresas-edit')
                            <a class="btn btn-primary" href="{{ route('empresas.edit', $empresa->id) }}">Editar</a>
                        @endcan
                        @csrf
                        @can('empresas-delete')
                            <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST">
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5"><em>Não há Empresas cadastradas!</em></td>
            </tr>
        @endif
        <tbody>
    </table>
    {!! $empresas->links() !!}
@endsection
