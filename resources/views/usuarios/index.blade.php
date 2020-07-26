@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestão de Usuários</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('usuarios.create') }}"> Criar Novo Usuário</a>
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
            <th>Nome</th>
            <th>E-mail</th>
            <th>Regras</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach($data as $key => $usuario)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $usuario->nome }}</td>
                <td>{{ $usuario->email }}</td>
                <td>
                    @if(!empty($usuario->getRoleNames()))
                        @foreach($usuario->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
            </td>
            <td>
                <a class="btn btn-info" href="{{ route('usuarios.show', $usuario->id) }}">Exibir</a>
                <a class="btn btn-primary" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $usuario->id], 'style' => 'display:inline']) !!}
                /*escaped*/{!!
                ?>Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                /*escaped*/{!!
                ?>Form::close() !!}
            </td>
            </tr>
        @endforeach
    </table>
    /*escaped*/{!!
    ?>$data->render() !!}
    <p class="text-center text-primary"><small>Tutorial by rscoder.com</small></p>
@endsection
