@extends('layouts.app')
@section('content')
    @component('components.titulos-paginas')
        @slot('titulo_pagina'){{ 'Usuários' }}@endslot
        @slot('name_class'){{ 'Usuario' }}@endslot
        @slot('name_route'){{ 'Usuarios' }}@endslot
    @endcomponent
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
        @if(count($data) > 0)
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
                        {{-- @can('usuarios-edit') --}}
                            <a class="btn btn-primary" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                        {{-- @endcan --}}
                        @csrf
                        {{-- @can('roles-delete') --}}
                            {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $usuario->id], 'style' => 'display:inline']) !!}
                            @if(Auth::user()->id!=$usuario->id && $tipo_usuario != "Admin")
                            {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                            @endif
                            {!! Form::close() !!}
                        {{-- @endcan --}}
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4"><em>Não há Usuários cadastrados!</em></td>
            </tr>
        @endif
        </tbody>
    </table>
    {!! $data->render() !!}
@endsection
