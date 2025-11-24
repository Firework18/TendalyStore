<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class BannerPerfil extends Component
{   

    public $user;
    public $name;
    public $username;
    public $imagen;

    public function mount(User $user){
        $this->user = $user;
        $this->actualizarBanner();
    }

    public function actualizarBanner(){
        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->imagen = $this->user->imagen;
    }

    protected $listeners = ['perfilEditado'=>'actualizarBanner'];

    public function render()
    {
        return view('livewire.banner-perfil');
    }
}
