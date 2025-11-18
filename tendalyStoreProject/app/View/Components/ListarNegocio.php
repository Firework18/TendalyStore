<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListarNegocio extends Component
{
    
    public $negocios;

    public function __construct($negocios)
    {
        $this->negocios = $negocios;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.listar-negocio');
    }
}
