<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;

class FiltrarTabla extends Component
{   

    public $termino;   
    public $estado;
     
    public function leerDatosFormulario(){
        $this->dispatch('filtrar',$this->termino,$this->estado);
    }

    public function render()
    {   
        $estados = Tag::where('id','>=','11')->get();
        return view('livewire.filtrar-tabla',compact('estados'));
    }
}
