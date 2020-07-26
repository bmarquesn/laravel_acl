@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Criar Novo Usuário</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Voltar</a>
            </div>
        </div>
    </div>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ocorreram alguns erros nos dados preenchidos.<br /><br />
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route' => 'usuarios.store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {!! Form::text('nome', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>E-mail:</strong>
                {!! Form::text('email', null, ['placeholder' => 'E-mail', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Senha:</strong>
                {!! Form::password('password', ['placeholder' => 'Senha', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirmar Senha:</strong>
                {!! Form::password('confirm-password', ['placeholder' => 'Confirmar Senha', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Regras:</strong>
                {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
    {!! Form::close() !!}
    <p class="text-center text-primary"><small>Tutorial by rscoder.com</small></p>
@endsection
