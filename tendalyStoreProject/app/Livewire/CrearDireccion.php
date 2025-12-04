<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Direccion;

class CrearDireccion extends Component
{   

    public $nombre;
    public $direccion;
    public $referencia;
    public $telefono;
    public $es_principal;
    public $existePrincipal;

    protected $rules = [
        'nombre'=>'required',
        'direccion'=>'required',
        'referencia'=>'required',
        'telefono'=>'required',
        'es_principal' => 'nullable|boolean',
    ];

    public function existePrincipal(){
        if($this->es_principal !== null){
            $existePrincipal = Direccion::where('es_principal',true)->first();
            if($existePrincipal !== null){
                $existePrincipal->es_principal = false;
                $existePrincipal->save();
            }
        }
    }

    public function crearDireccion(){

        $datos = $this->validate();

        $this->existePrincipal();

        $direccion = Direccion::create([
            'nombre'=> $datos['nombre'],
            'direccion'=> $datos['direccion'],
            'referencia'=> $datos['referencia'],
            'telefono'=> $datos['telefono'],
            'es_principal'=>$this->es_principal ?? false,
            'user_id'=>auth()->user()->id,
        ]);
        
        
        session()->flash('mensaje','Direccion creada correctamente');

        return redirect()->route('direcciones.index');
    }

    public function render()
    {
        return view('livewire.crear-direccion');
    }
}
