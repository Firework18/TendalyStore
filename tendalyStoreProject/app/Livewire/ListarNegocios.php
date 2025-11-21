<?php

namespace App\Livewire;

use App\Models\Negocio;
use Livewire\Component;
use Livewire\WithPagination;

class ListarNegocios extends Component
{   

    use WithPagination;

    public $termino;
    public $categoria;

    public function buscar($termino,$categoria){

        $this->termino = $termino;
        $this->categoria = $categoria;
    }

    protected $listeners = ['filtrar'=>'buscar'];

    public function render()
    {   
        
        $negocios = Negocio::when($this->termino,function($query){
            $query->where('nombre','LIKE',"%".$this->termino."%");
        })
        ->when($this->categoria,function($query){
            $query->where('categoria_negocio_id',$this->categoria);
        })
        ->paginate(9);

        return view('livewire.listar-negocios',compact('negocios'));
    }
}
