<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TitulosPaginas extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $titulo_pagina;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titulo_pagina)
    {
        $titulo_pagina = str_replace('ç', 'c', strtolower($titulo_pagina));
        $this->titulo_pagina = $titulo_pagina;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.titulos-paginas');
    }
}
