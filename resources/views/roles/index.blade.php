@extends('layouts.app')
@section('content')
    @component('components.titulos-paginas')
        @slot('titulo_pagina'){{ 'Regras' }}@endslot
        @slot('name_class'){{ 'Role' }}@endslot
        @slot('name_route'){{ 'Roles' }}@endslot
    @endcomponent
    <table id="tabela" class="table table-bordered table-striped tablesorter">
        <thead>
            <tr>
                <th>Nome</th>
                <th width="280px">Ação</th>
            </tr>
        </thead>
        <body>
        @if(count($roles) > 0)
            @foreach($roles as $key => $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Exibir</a>
                        @can('roles-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                        @endcan
                        @csrf
                        @can('roles-delete')
                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' =>
                            'display:inline']) !!}
                            @if($role->name != "Admin")
                                {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                            @endif
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2"><em>Não há Regras cadastradas!</em></td>
            </tr>
        @endif
        </body>
    </table>
    {!! $roles->render() !!}
@endsection
