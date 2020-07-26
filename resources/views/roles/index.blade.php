@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gerenciador de Regras</h2>
            </div>
            <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Criar Nova Regra</a>
                @endcan
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
            <th width="280px">Ação</th>
        </tr>
        @foreach($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Exibir</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' =>
                        'display:inline']) !!}
                        /*escaped*/{!!
                        ?>Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                        /*escaped*/{!!
                        ?>Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
    /*escaped*/{!!
    ?>$roles->render() !!}
    <p class="text-center text-primary"><small>Tutorial by rscoder.com</small></p>
@endsection
