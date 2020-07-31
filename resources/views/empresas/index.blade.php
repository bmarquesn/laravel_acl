@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Empresas</h2>
            </div>
            <div class="pull-right">
                @can('empresa-create')
                    <a class="btn btn-success" href="{{ route('empresas.create') }}"> Criar Nova Empresa</a>
                @endcan
                <a class="btn btn-primary" href="{{ route('exportar', ['id' => 'empresas']) }}" target="_blank">Exportar Empresas (JSON)</a>
            </div>
        </div>
    </div>
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
