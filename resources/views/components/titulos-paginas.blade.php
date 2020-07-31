<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ $titulo_pagina }} </h2>
        </div>
        <div class="pull-right">
            {{ strtolower(substr($titulo_pagina, 0, -1)) }}
            @can(strtolower(substr($titulo_pagina, 0, -1)).'-create')
                <a class="btn btn-success" href="{{ route(strtolower($titulo_pagina).'.create') }}"> Criar Nova {{ substr($titulo_pagina, 0, -1) }}</a>
            @endcan
            <a class="btn btn-primary" href="{{ route('exportar', ['id' => strtolower($titulo_pagina)]) }}" target="_blank">Exportar {{ $titulo_pagina }} (JSON)</a>
        </div>
    </div>
</div>
