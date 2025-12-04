<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Direccion;

class EditarDireccion extends Component
{
    public $direccion_obj;
    public $nombre;
    public $direccion;
    public $referencia;
    public $telefono;
    public $es_principal;
    public $existePrincipal;

    public function mount(Direccion $direccion){
        $this->direccion_obj = $direccion; 
        $this->nombre = $direccion->nombre;
        $this->direccion = $direccion->direccion;
        $this->referencia = $direccion->referencia;
        $this->telefono = $direccion->telefono;
        $this->es_principal = (bool) $direccion->es_principal;

    }

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'direccion' => 'required|string',
        'telefono' => 'required|string',
        'referencia' => 'nullable|string',
        'es_principal' => 'nullable|boolean',
    ];

    public function editarDireccion(){
        $this->validate();

        if ($this->es_principal) {
            Direccion::where('user_id', auth()->id())
                ->where('id', '!=', $this->direccion_obj->id)
                ->update(['es_principal' => 0]);
        }

        $this->direccion_obj->update([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'referencia' => $this->referencia,
            'telefono' => $this->telefono,
            'es_principal' => $this->es_principal ? 1 : 0,
        ]);

        session()->flash('mensaje', 'Dirección actualizada correctamente.');
        return redirect()->route('direcciones.index');
    }

    public function render()
    {
        return view('livewire.editar-direccion');
    }
}
