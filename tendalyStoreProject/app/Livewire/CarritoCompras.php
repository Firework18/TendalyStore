<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Carrito;
use Livewire\Component;

class CarritoCompras extends Component
{

    public $carrito;

    public function mount(Carrito $carrito)
    {
        $this->carrito = $carrito->load("items.producto.negocio");
    }


    public function render()
    {

        return view('livewire.carrito');
    }
}
