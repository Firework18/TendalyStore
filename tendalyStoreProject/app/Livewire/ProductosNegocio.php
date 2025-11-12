<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;

class ProductosNegocio extends Component
{
    use WithPagination;
    
    public $negocio_id;

    protected $paginationTheme = 'tailwind';

    public function mount($negocio_id){
        $this->negocio_id = $negocio_id;
    }

    public function render()
    {
        $productos = Producto::where('negocio_id',$this->negocio_id)
                        ->orderBy('created_at','desc')
                        ->paginate(4);

        return view('livewire.productos-negocio',compact('productos'));
    }
}
