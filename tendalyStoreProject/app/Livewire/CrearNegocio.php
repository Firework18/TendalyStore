<?php

namespace App\Livewire;

use App\Models\Negocio;
use App\Models\Tag;
use Livewire\Component;
use App\Models\Departamento;
use Livewire\WithFileUploads;
use App\Models\CategoriaNegocio;

class CrearNegocio extends Component
{

    public $nombre;
    public $descripcion;
    public $historia;
    public $categoria_negocio_id;
    public $ubicacion;
    public $departamento_id;
    public $provincia_id;
    public $distrito_id;
    public $correo;
    public $telefono;
    public $imagen;

    public $tagsSeleccionados = [];
    public $tags;

    use WithFileUploads;

    public function mount(){
        $this->tags = Tag::all();
    }

    public function toggleTag($tagId)
    {
        if (in_array($tagId, $this->tagsSeleccionados)) {
            // Si ya está, se quita
            $this->tagsSeleccionados = array_filter($this->tagsSeleccionados, fn($id) => $id != $tagId);
            return;
        }

        // Limitar a 5
        if (count($this->tagsSeleccionados) >= 5) {
            $this->dispatch('mostrarAlerta', message: 'Solo puedes seleccionar hasta 5 etiquetas.');
            return;
        }

        // Agregar
        $this->tagsSeleccionados[] = $tagId;
    }

    protected $rules = [
        'nombre'=> 'required|max:255',
        'descripcion'=> 'required|string|max:500',
        'historia'=> 'required|string|max:1000',
        'categoria_negocio_id'=> 'required|exists:categoria_negocios,id',
        'ubicacion'=> 'required|max:255',
        'departamento_id'=> 'required|exists:departamentos,id',
        'provincia_id'=> 'required|exists:provincias,id',
        'distrito_id'=> 'required|exists:distritos,id',
        "correo"=>'required|email|max:255|unique:negocios,correo',
        'telefono'=>'required',
        'imagen'=>'required',
        'tagsSeleccionados'=>'array|max:5',
    ];

    public function crearNegocio(){
        $datos =  $this->validate();

        //Almacenar la imagen
        $imagen = $this->imagen->store('negocios', 'public');
        $datos['imagen'] = basename($imagen);

        $negocio = Negocio::create([
        'nombre'=> $this->nombre,
        'descripcion'=> $this->descripcion,
        'historia'=> $this->historia,
        'categoria_negocio_id'=> $this->categoria_negocio_id,
        'ubicacion'=> $this->ubicacion,
        'departamento_id'=> $this->departamento_id,
        'provincia_id'=> $this->provincia_id,
        'distrito_id'=> $this->distrito_id,
        "correo"=> $this->correo,
        'telefono'=> $this->telefono,
        'imagen'=> $datos['imagen'],
        'user_id'=> auth()->user()->id,
        ]);

        $negocio->tags()->sync($this->tagsSeleccionados);

        session()->flash('negocio','Negocio creado exitosamente');

        return redirect()->route('dashboard.negocio');
    }

    public function render()
    {   
        $categorias = CategoriaNegocio::all();
        $departamentos = Departamento::all();
        return view('livewire.crear-negocio',compact('categorias','departamentos'));
    }
}
