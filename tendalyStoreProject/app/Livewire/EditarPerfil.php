<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarPerfil extends Component
{   

    public $user;
    public $user_id;
    public $name;
    public $apellido_paterno;
    public $apellido_materno;
    public $email;
    public $username;
    public $telefono;
    public $imagen;
    public $informacion;

    public $imagen_nueva;

    use WithFileUploads;

    protected function rules(){
        return [
            'name'=> 'required|max:255',
            'username'=> 'required|string|min:5|unique:users,username,'.$this->user_id,
            'apellido_paterno'=> 'nullable|string',
            'apellido_materno'=> 'nullable|string',
            'telefono'=>'nullable|max:9',
            'informacion'=> 'nullable|max:255',
            'imagen_nueva'=>'nullable|image'
        ];
    }


    public function mount(User $user){
        $this->user = $user;
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->apellido_paterno = $user->apellido_paterno;
        $this->apellido_materno = $user->apellido_materno;
        $this->email = $user->email;
        $this->telefono = $user->telefono;
        $this->informacion = $user->informacion;
        $this->imagen = $user->imagen;
    }

    public function editarPerfil(){
        $datos = $this->validate($this->rules());

        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('perfiles','public');
            $datos['imagen'] = basename($imagen);
        }

        $user = User::find($this->user_id);

        $user->name = $datos['name'];
        $user->username = $datos['username'];
        $user->apellido_paterno = $datos['apellido_paterno'];
        $user->apellido_materno = $datos['apellido_materno'];
        $user->informacion = $datos['informacion'];
        $user->telefono = $datos['telefono'];
        $user->imagen = $datos['imagen'] ?? $user->imagen;

        $user->save();

        $this->imagen_nueva = '';

        $this->dispatch('perfilEditado',type:'success',message:'Perfil actualizado',text:'Tu perfil se ha actualizado exitosamente');

    }

    public function render()
    {
        return view('livewire.editar-perfil');
    }
}
