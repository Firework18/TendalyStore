<?php

namespace App\Livewire;

use App\Models\Orden;
use Livewire\Component;
use Livewire\WithPagination;

class OrdenCliente extends Component
{   

    use WithPagination;

    public $termino;
    public $estado;

    public function buscar($termino,$estado){
        $this->termino = $termino;
        $this->estado = $estado;
    }

    protected $listeners = ['filtrar'=>'buscar'];

    public function render()
    {

        $user = auth()->user();

        $misOrdenes = Orden::when($this->termino,function($query){
            $query->where('codigo','LIKE','%'.$this->termino.'%');
        })
        ->when($this->estado,function($query){
            $query->where('estado',$this->estado);
        })
        ->where('user_id',$user->id)->orderBy('created_at','desc')->paginate(10);

        return view('livewire.orden-cliente',compact('misOrdenes'));
    }
}
