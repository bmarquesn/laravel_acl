@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestão de Endereços</h2>
            </div>
            <div class="pull-right">
                @can('endereco-create')
                    <a class="btn btn-success" href="{{ route('enderecos.create') }}">Criar Novo Endereço</a>
                @endcan
                <a class="btn btn-primary" href="{{ route('exportar', ['id' => 'enderecos']) }}" target="_blank">Exportar Endereço (JSON)</a>
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
