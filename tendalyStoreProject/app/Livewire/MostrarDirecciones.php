<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Direccion;
use Livewire\Attributes\On;

class MostrarDirecciones extends Component
{   

    #[On('eliminar')]
    public function eliminarDireccion(Direccion $direccion){
        Direccion::find($direccion->id)->delete();
    }

    public function render()
    {   
        $direcciones = Direccion::where('user_id',auth()->user()->id)->get();
        return view('livewire.mostrar-direcciones',compact('direcciones'));
    }
}
