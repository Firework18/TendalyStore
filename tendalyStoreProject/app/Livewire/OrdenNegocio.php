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

    public function cambiarEstado($ordenId, $tagId){
        if (!$ordenId || !$tagId) return;

        $orden = Orden::with('items.productos')->find($ordenId);
        
        if ($orden) {
            $estadoAnterior = strtolower($orden->estado); 
            $orden->tags()->sync([(int) $tagId]);
            $nuevoTag = Tag::find($tagId);

            if ($nuevoTag) {
                $nuevoNombreTag = strtolower($nuevoTag->nombre);
                $orden->update(['estado' => $nuevoTag->nombre]);
                
                $this->dispatch('estadoEditado',type: 'success',message: 'Estado actualizado',text: 'El estado de la orden se ha actualizado exitosamente');

                $estadosNoConsumenStock = ['pendiente', 'rechazado', 'cancelado'];

                $esNuevoEstadoValido = !in_array($nuevoNombreTag, $estadosNoConsumenStock); 
                $veniaDeEstadoSinConsumo = in_array($estadoAnterior, $estadosNoConsumenStock);

                if ($veniaDeEstadoSinConsumo && $esNuevoEstadoValido) {
                    foreach ($orden->items as $item) {
                        if ($item->productos) {
                            $item->productos()->decrement('stock', $item->cantidad);
                        }
                    }
                }
                elseif (!$veniaDeEstadoSinConsumo && !$esNuevoEstadoValido) {
                    
                    foreach ($orden->items as $item) {
                        if ($item->productos) {
                            $item->productos()->increment('stock', $item->cantidad);
                        }
                    }
                }
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