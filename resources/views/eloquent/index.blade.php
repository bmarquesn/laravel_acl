@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Eloquent: Relationships</h2>
            </div>
        </div>
    </div>
    <br />
    <p>As tabelas de banco de dados costumam estar relacionadas umas às outras. Por exemplo, uma postagem de blog pode ter muitos comentários ou um pedido pode estar relacionado ao usuário que o fez. O Eloquent facilita o gerenciamento e o trabalho com esses relacionamentos e oferece suporte a vários tipos diferentes de relacionamentos:</p>
    <ol>
        <li>One To One</li>
        <li>One To Many</li>
        <li>Many To Many</li>
        <li>Has One Through</li>
        <li>Has Many Throughv</li>
        <li>One To One (Polymorphic)</li>
        <li>One To Many (Polymorphic)</li>
        <li>Many To Many (Polymorphic)</li>
    </ol>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h3>One To One</h3>
            <p>1 Registro para 1 Registro.<br />Por exemplo: 1 Usuario para 1 Empresa</p>
            <p>Sintaxe:</p>
            <p>Na Model Usuario cria-se a relação com a Empresa:<em></em></p>
            <code>public function empresa()
                {
                    return $this->hasOne('App\Models\Empresa');
                }
            </code>
            <p><em>Será retornado o objeto de 1 USUARIO vinculado ao objeto de 1 EMPRESA</em></p>
            ---
            <p>O inverso de "hasOne" é "belongsTo".<br />Por Exemplo: 1 Empresa que 1 Usuario a contém.</p>
            <p>Sintaxe:</p>
            <p>Na Model Empresa traz-se a relação com o Usuario:<em></em></p>
            <code>public function usuario()
                {
                    return $this->belongsTo('App\Models\Usuario');
                }
            </code>
            <p><em>Então na Controller EMPRESA, ao chamar a função da model "usuario()", será retornado o objeto de 1 EMPRESA que estiver vinculada à 1 USUARIO</em></p>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h3>One To Many</h3>
            <p>1 Registro para 'N' Registros<br />Por exemplo: 1 Empresa tem vários Enderecos</p>
            <p>Sintaxe:</p>
            <p>Na Model Empresa cria-se a relação com os Enderecos:<em></em></p>
            <code>public function enderecos()
                {
                    return $this->hasMany('App\Models\Endereco');
                }
            </code>
            <p><em>Então na Controller EMPRESA, ao chamar a função da model "enderecos()", serão retornados 'N' ENDERECOS que estiverem vinculados a 1 EMPRESA</em></p>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h3>Many To Many</h3>
        </div>
    </div>
    <h3>Has One Through</h3>
    <h3>Has Many Throughv</h3>
    <h3>One To One (Polymorphic)</h3>
    <h3>One To Many (Polymorphic)</h3>
    <h3>Many To Many (Polymorphic)</h3>
@endsection
