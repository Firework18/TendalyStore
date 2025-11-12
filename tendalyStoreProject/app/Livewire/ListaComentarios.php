<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comentario;

class ListaComentarios extends Component
{
    public $negocio_id;
    protected $listeners = ['comentarioAgregado' => '$refresh'];

    public function render()
    {
        $comentarios = Comentario::where('negocio_id', $this->negocio_id)
            ->with('usuarios')
            ->latest()
            ->get();


        return view('livewire.lista-comentarios', compact('comentarios'));
    }
}
