@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestão de Usuários</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('usuarios.create') }}"> Criar Novo Usuário</a>
                <a class="btn btn-primary" href="{{ route('exportar', ['id' => 'users']) }}" target="_blank">Exportar Usuários (JSON)</a>
            </div>
        </div>
    </div>
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br />
    <table id="tabela" class="table table-bordered table-striped tablesorter">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Regras</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $usuario)
            <tr>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>
                    @php
                        $tipo_usuario = 'User';
                    @endphp
                    @if(!empty($usuario->getRoleNames()))
                        @foreach($usuario->getRoleNames() as $v)
                            @php
                                $tipo_usuario = $v;
                            @endphp
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('usuarios.show', $usuario->id) }}">Exibir</a>
                    <a class="btn btn-primary" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $usuario->id], 'style' => 'display:inline']) !!}
                    @if(Auth::user()->id!=$usuario->id && $tipo_usuario != "Admin")
                        {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                    @endif
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $data->render() !!}
    <p class="text-center text-primary"><small>Tutorial by rscoder.com</small></p>
@endsection
