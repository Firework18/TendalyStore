<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Carrito;
use Livewire\Component;
use App\Models\Producto;
use App\Models\CarritoItem;
use Livewire\Attributes\On;

class CarritoCompras extends Component
{

    public $carrito;

    public function mount(Carrito $carrito)
    {
        $this->carrito = $carrito->load("items.producto.negocio");
    }

    #[On('eliminar')]
    public function eliminarProducto(Producto $producto){
        CarritoItem::where('producto_id',$producto->id)->delete();
    }

    public function render()
    {
        return view('livewire.carrito');
    }
}
