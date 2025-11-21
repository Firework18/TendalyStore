<?php

namespace App\Livewire;

use App\Models\Tag;
use App\Models\Negocio;
use Livewire\Component;
use App\Models\Distrito;
use App\Models\Provincia;
use App\Models\Departamento;
use Livewire\WithFileUploads;
use App\Models\CategoriaNegocio;

class EditarNegocio extends Component
{   

    public $negocio_id;
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

    public $negocio;
    public $tagsSeleccionados = [];
    public $tags;

    public $departamento,$provincia,$distrito;

    public $imagen_nueva;

    use WithFileUploads;

    protected function rules(){
        return [
            'nombre'=> 'required|max:255',
            'descripcion'=> 'required|string|max:500',
            'historia'=> 'required|string|max:1000',
            'categoria_negocio_id'=> 'required|exists:categoria_negocios,id',
            'ubicacion'=> 'required|max:255',
            'departamento_id'=> 'required|exists:departamentos,id',
            'provincia_id'=> 'required|exists:provincias,id',
            'distrito_id'=> 'required|exists:distritos,id',
            'correo' => 'required|email|max:255|unique:negocios,correo,' . $this->negocio_id,
            'telefono'=>'required',
            'imagen_nueva'=>'nullable|image'
        ];
    }

    public function mount(Negocio $negocio){
        $this->negocio = $negocio;
        $this->negocio_id = $negocio->id;
        $this->nombre = $negocio->nombre;
        $this->descripcion = $negocio->descripcion;
        $this->historia = $negocio->historia;
        $this->categoria_negocio_id = $negocio->categoria_negocio_id;
        $this->ubicacion = $negocio->ubicacion;
        $this->departamento_id = $negocio->departamento_id;
        $this->provincia_id = $negocio->provincia_id;
        $this->distrito_id = $negocio->distrito_id;
        $this->correo = $negocio->correo;
        $this->telefono = $negocio->telefono;
        $this->imagen = $negocio->imagen;

        $this->tags = Tag::all();

        $this->tagsSeleccionados = $negocio->tags()->pluck('tag_id')->toArray();

        $this->departamento = Departamento::find($this->departamento_id);
        $this->provincia = Provincia::find($this->provincia_id);
        $this->distrito = Distrito::find($this->distrito_id);
        
    }

    public function toggleTag($tagId)
    {
        if (in_array($tagId, $this->tagsSeleccionados)) {
            $this->tagsSeleccionados = array_filter($this->tagsSeleccionados, fn($id) => $id != $tagId);
            return;
        }

        if (count($this->tagsSeleccionados) >= 5) {
            $this->dispatch('mostrarAlerta', message: 'Solo puedes seleccionar hasta 5 etiquetas.');
            return;
        }

        $this->tagsSeleccionados[] = $tagId;
    }


    public function editarNegocio(){
        $datos = $this->validate($this->rules());

        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('negocios','public');
            $datos['imagen'] = basename($imagen);
        }

            $negocio = Negocio::find($this->negocio_id);

            $negocio->nombre = $datos['nombre'];
            $negocio->descripcion = $datos['descripcion'];
            $negocio->historia = $datos['historia'];
            $negocio->categoria_negocio_id = $datos['categoria_negocio_id'];
            $negocio->ubicacion = $datos['ubicacion'];
            $negocio->departamento_id = $datos['departamento_id'];
            $negocio->provincia_id = $datos['provincia_id'];
            $negocio->distrito_id = $datos['distrito_id'];
            $negocio->correo = $datos['correo'];
            $negocio->telefono = $datos['telefono'];
            $negocio->imagen = $datos['imagen'] ?? $negocio->imagen;

            $this->negocio->tags()->sync($this->tagsSeleccionados);

            if($this->negocio_id !== auth()->user()->negocios->id){
                session()->flash('error','No tiene permitido editar este negocio');
                return redirect()->route('dashboard.negocio');
            }

            $negocio->save();

            session()->flash('negocio','Negocio actualizado correctamente');

            return redirect()->route('dashboard.negocio');
    }
    

    public function render()
    {
        $categorias = CategoriaNegocio::all();
        $departamentos = Departamento::all();
        return view('livewire.editar-negocio',compact('categorias','departamentos'));
    }
}
