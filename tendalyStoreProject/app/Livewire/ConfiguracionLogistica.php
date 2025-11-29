<?php

namespace App\Livewire;

use App\Models\Negocio;
use Livewire\Component;
use Livewire\WithFileUploads;

class ConfiguracionLogistica extends Component
{   
    public $negocio;
    public $negocio_id;
    public $costo_envio;
    public $envio_disponible;
    public $telefono_yape;
    
    public $imagen_qr_yape;

    public $qr_yape_nuevo;

    use WithFileUploads;

    protected $rules = [
        'costo_envio'=>'nullable|numeric|min:0',
        'envio_disponible'=>'nullable|bool',
        'telefono_yape'=>'nullable|max:9',
        'qr_yape_nuevo'=>'nullable|image',
    ];

    public function mount(){
        $negocio = Negocio::find(auth()->user()->negocios->id);
        $this->negocio_id = $negocio->id;
        $this->costo_envio = $negocio->costo_envio;
        $this->telefono_yape = $negocio->telefono_yape;
        $this->envio_disponible = (bool) $negocio->envio_disponible;
        $this->imagen_qr_yape = $negocio->imagen_qr_yape;
    }

    public function guardar(){
        $datos = $this->validate();

        if($this->qr_yape_nuevo){
            $imagen_qr_yape = $this->qr_yape_nuevo->store('qr_imagenes_negocios','public');
            $datos['imagen'] = basename($imagen_qr_yape);
        }

        $negocio = Negocio::find($this->negocio_id);

        $negocio->costo_envio = $datos['costo_envio'];
        $negocio->envio_disponible = $datos['envio_disponible'] ?? false;
        $negocio->imagen_qr_yape = $datos['imagen'] ?? $negocio->imagen_qr_yape;
        $negocio->telefono_yape = $datos['telefono_yape'];

        $negocio->save();

        session()->flash('logistica','Configuración de Logística y Pagos actualizada correctamente');

        return redirect()->route('dashboard.negocio');

    }


    public function render()
    {
    
        return view('livewire.configuracion-logistica');
    }
}
