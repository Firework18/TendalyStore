<?php

namespace App\Livewire;

use App\Models\Negocio;
use Livewire\Component;
use App\Models\Producto;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class MostrarProductos extends Component
{
    use WithPagination;

    public $negocio;

    public function mount($negocio)
    {
        $this->negocio = $negocio;
    }

     #[On('eliminar')]
    public function eliminarProducto(Producto $producto){
        Producto::find($producto->id)->delete();
    }

    public function render()
    {      

        if (!$this->negocio) {
            return view('livewire.mostrar-productos', [
                'productos' => collect(),
            ]);
        }
        return view('livewire.mostrar-productos', [
            'productos' => Producto::where('negocio_id', $this->negocio->id)
                ->paginate(5,['*'],'productosPage'),
        ]);
    }
}
