@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Regra</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Voltar</a>
            </div>
        </div>
    </div>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Houveram alguns problemas com os dados preenchidos.<br /><br />
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {!! Form::text('name', null, ['placeholder' => 'Nome', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissão:</strong>
                <br />
                <ul id="permissoes">
                @foreach($grupo_permissoes as $value)
                    <li><a href="#">{{$value}}</a>
                        <ul class="list-unstyled" style="display:none;">
                            @foreach($permission as $value2)
                                @if(strstr($value2->name, $value))
                                    <li><label>
                                        {{ Form::checkbox('permission[]', $value2->id, in_array($value2->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                        {{ $value2->name }}
                                    </label></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

