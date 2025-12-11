<?php

namespace App\Livewire;

use App\Models\Tag;
use App\Models\Orden;
use Livewire\Component;
use Livewire\WithPagination;

class OrdenNegocio extends Component
{
    use WithPagination;

    public $termino;
    public $estado;
    public $tagId;

    public function cambiarEstado($ordenId, $tagId)
    {
        if (!$ordenId || !$tagId) return;

        $orden = Orden::find($ordenId);
        
        if ($orden) {
            $orden->tags()->sync([(int) $tagId]);

            $nuevoTag = Tag::find($tagId);
            if ($nuevoTag) {
                $orden->update(['estado' => $nuevoTag->nombre]);
                $this->dispatch('estadoEditado',type:'success',message:'Estado actualizado',text:'El estado de la orden se ha actualizado exitosamente');
            }
            
        }
    }

    public function buscar($termino,$estado){

        $this->termino = $termino;
        $this->estado = $estado;
    }

    protected $listeners = ['filtrar'=>'buscar'];

    public function render()
    {
        $user = auth()->user();
        
        $negocio = $user->negocios;

        $estadosDisponibles = Tag::where('id', '>=', '11')->get();
        $misVentas = null;

        if ($negocio) {
            
            $misVentas = Orden::when($this->termino,function($query){
                $query->where('codigo','LIKE',"%".$this->termino."%");
            })
            ->when($this->estado,function($query){
                $query->where('estado',$this->estado);
            })->where('negocio_id',$negocio->id)->latest()->paginate(10);
        }

        return view('livewire.orden-negocio', compact('misVentas', 'estadosDisponibles', 'negocio'));
    }
}