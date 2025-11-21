<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CategoriaNegocio;

class FiltrarNegocios extends Component
{   

    public $termino;
    public $categoria;
    
    public function leerDatosFormulario(){
        $this->dispatch('filtrar',$this->termino,$this->categoria);
    }

    public function render()
    {   
        $categorias = CategoriaNegocio::all();
        return view('livewire.filtrar-negocios',compact('categorias'));
    }
}
