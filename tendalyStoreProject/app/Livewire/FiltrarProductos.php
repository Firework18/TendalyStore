<?php

namespace App\Livewire;

use Livewire\Component;

class FiltrarProductos extends Component
{   

    public $termino;

    public function leerDatosFormulario(){
        $this->dispatch('filtrar',$this->termino);
    }

    public function render()
    {
        return view('livewire.filtrar-productos');
    }
}
