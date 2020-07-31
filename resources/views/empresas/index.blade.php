@extends('layouts.app')
@section('content')
    @component('components.titulos-paginas')
        @slot('titulo_pagina')
            Empresas
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
            <th>Vínculo Usuário</th>
            <th>Razão Social</th>
            <th>Nome Fantasia</th>
            <th>CNPJ</th>
            <th width="280px">Action</th>
        </tr>
        @foreach($empresas as $empresa)
            <tr>
                <td>{{ $empresa->nomeUsuario }}</td>
                <td>{{ $empresa->razao_social }}</td>
                <td>{{ $empresa->nome_fantasia }}</td>
                <td>{{ $empresa->cnpj }}</td>
                <td>
                    <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('empresas.show', $empresa->id) }}">Exibir</a>
                        @can('empresa-edit')
                            <a class="btn btn-primary" href="{{ route('empresas.edit', $empresa->id) }}">Editar</a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('empresa-delete')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $empresas->links() !!}
    <p class="text-center text-primary"><small>Tutorial by rscoder.com</small></p>
@endsection
