@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Endereço</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('enderecos.index') }}"> Voltar</a>
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
    {!! Form::model($endereco, ['method' => 'PATCH', 'route' => ['enderecos.update', $endereco->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Selecione a Empresa:</strong>
                {!! Form::select('empresa_id', $endereco->empresas, $endereco->empresa_id, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CEP:</strong>
                {!! Form::text('cep', $endereco->cep, ['placeholder' => 'CEP', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Logradouro:</strong>
                {!! Form::text('logradouro', $endereco->logradouro, ['placeholder' => 'Logradouro', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Número:</strong>
                {!! Form::text('numero', $endereco->numero, ['placeholder' => 'Número', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Complemento:</strong>
                {!! Form::text('complemento', $endereco->complemento, ['placeholder' => 'Complemento', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bairro:</strong>
                {!! Form::text('bairro', $endereco->bairro, ['placeholder' => 'Bairro', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cidade:</strong>
                {!! Form::text('cidade', $endereco->cidade, ['placeholder' => 'Cidade', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado:</strong>
                {!! Form::select('estado', $ufs_brasil, $endereco->estado, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
    {!! Form::close() !!}

    <script type="text/javascript" src="{{ URL::asset('assets/js/busca_cep.js') }}"></script>
@endsection
