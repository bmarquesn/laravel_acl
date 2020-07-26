@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Empresa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('empresas.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ocorreram alguns erros nos dados preenchidos.<br /><br />
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('empresas.update', $empresa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Razão Social:</strong>
                    <input type="text" name="razao_social" value="{{ $empresa->razao_social }}" class="form-control" placeholder="Razão Social" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome Fantasia:</strong>
                    <input type="text" name="nome_fantasia" value="{{ $empresa->nome_fantasia }}" class="form-control" placeholder="Nome Fantasia" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CNPJ:</strong>
                    <input type="text" name="cnpj" value="{{ $empresa->cnpj }}" class="form-control" placeholder="CNPJ" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </form>
    <p class="text-center text-primary"><small>Tutorial by rscoder.com</small></p>
@endsection
