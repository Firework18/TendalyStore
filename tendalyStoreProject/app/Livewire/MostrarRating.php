<?php

namespace App\Livewire;

use App\Models\Negocio;
use Livewire\Component;

class MostrarRating extends Component
{

    public $negocio_id;
    public $promedio;
    public $resenas;

    public function mount($negocio_id){
        $this->negocio_id = $negocio_id;
        $this->actualizarDatos();  
    }

    public function actualizarDatos(){
        $this->resenas = Negocio::find($this->negocio_id)
                ->comentarios()
                ->count();
        $this->promedio = Negocio::find($this->negocio_id)
                ->comentarios()
                ->avg('rating');
    }

    protected $listeners = ['comentarioAgregado'=>'actualizarDatos'];

    public function render()
    {
        return view('livewire.mostrar-rating');
    }
}
