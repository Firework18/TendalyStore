<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;

class AnadirComentario extends Component
{
    public $negocio_id;
    public $comentario = '';
    public $rating = 0;
    public $yaComento = false;

    public function mount($negocio_id)
    {
        $this->negocio_id = $negocio_id;

        // Verificamos si el usuario ya comentó
        $this->yaComento = Comentario::where('negocio_id', $negocio_id)
            ->where('user_id', Auth::id())
            ->exists();
    }

    public function guardar()
    {
        $this->validate([
            'comentario' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Si ya comentó, no permitimos otro comentario
        if ($this->yaComento) {
            session()->flash('error', 'Ya has comentado anteriormente.');
            return;
        }

        Comentario::create([
            'negocio_id' => $this->negocio_id,
            'user_id' => Auth::id(),
            'comentario' => $this->comentario,
            'rating' => $this->rating,
        ]);

        $this->reset('comentario', 'rating');

        // Marcar que ya comentó → Livewire re-renderiza y muestra el aviso
        $this->yaComento = true;

        // Enviar mensaje de éxito
        session()->flash('success', 'Comentario publicado correctamente.');

        // Emitir evento para actualizar lista de comentarios
        $this->dispatch('comentarioAgregado');

    }


    public function render()
    {   
    
        return view('livewire.anadir-comentario');
    }
}
