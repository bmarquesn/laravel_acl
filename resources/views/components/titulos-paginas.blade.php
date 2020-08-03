<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ $titulo_pagina }} </h2>
        </div>
        <div class="pull-right">
            @can(strtolower($name_route).'-create')
                <a class="btn btn-success" href="{{ route(strtolower($name_route).'.create') }}"> Criar Nova {{ substr($titulo_pagina, 0, -1) }}</a>
            @endcan
            <a class="btn btn-primary" href="{{ route('exportar', ['id' => strtolower($name_route)]) }}" target="_blank">Exportar {{ $titulo_pagina }} (JSON)</a>
        </div>
    </div>
</div>
<br />
@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    <br />
@endif
