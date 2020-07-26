@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestão de Endereços</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('enderecos.create') }}"> Criar Novo Endereço</a>
            </div>
        </div>
    </div>
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Num</th>
            <th>Empresa</th>
            <th>CEP</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach($data as $key => $enderecos)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $enderecos->empresa_id }}</td>
                <td>{{ $enderecos->cep }}</td>
                <td>
                    @if(!empty($enderecos->getRoleNames()))
                        @foreach($enderecos->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
            </td>
            <td>
                <a class="btn btn-info" href="{{ route('enderecos.show', $enderecos->id) }}">Exibir</a>
                <a class="btn btn-primary" href="{{ route('enderecos.edit', $enderecos->id) }}">Editar</a>
                {!! Form::open(['method' => 'DELETE', 'route' => ['enderecos.destroy', $enderecos->id], 'style' => 'display:inline']) !!}
                {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
            </tr>
        @endforeach
    </table>
    {!! $data->render() !!}
    <p class="text-center text-primary"><small>Tutorial by rscoder.com</small></p>
@endsection
