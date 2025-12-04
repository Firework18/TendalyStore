<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithFileUploads;

class EditarProducto extends Component
{   

    public $producto_id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $precio_oferta;
    public $stock;
    public $unidad_medida;
    public $imagen;
    public $negocio_id;

    public $imagen_nueva;

    use WithFileUploads;

    protected $rules = [
        "nombre" => 'required|string',
        'descripcion' => 'required',
        "precio" => 'required',
        'precio_oferta'=>'nullable|numeric',
        'stock' => 'required',
        'unidad_medida' => 'required',
        'imagen_nueva' => 'nullable|image',
    ];

    public function mount(Producto $producto){

        $this->producto_id = $producto->id;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->precio = $producto->precio;
        $this->precio_oferta = $producto->precio_oferta;
        $this->stock = $producto->stock;
        $this->unidad_medida = $producto->unidad_medida;
        $this->imagen = $producto->imagen;
        $this->negocio_id = $producto->negocio_id;
    }

    public function editarProducto(){

        $datos = $this->validate();

        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('productos', 'public');
            $datos['imagen'] = basename($imagen);
        }

        $producto = Producto::find($this->producto_id);

        $producto->nombre = $datos['nombre'];
        $producto->descripcion = $datos['descripcion'];
        $producto->precio = $datos['precio'];
        $producto->precio_oferta = $datos['precio_oferta'];
        $producto->stock = $datos['stock'];
        $producto->unidad_medida = $datos['unidad_medida'];
        $producto->imagen = $datos['imagen'] ?? $producto->imagen;

        if($this->negocio_id !== auth()->user()->negocios->id){
            session()->flash('error','No tienes permiso de editar este producto.');
            return redirect()->route('dashboard.producto');
        }

        if($this->precio <= $this->precio_oferta){
            session()->flash('error','No puedes asignar un precio de oferta menor al precio regular');
            return redirect()->route('dashboard.producto');
        }

        $producto->save();

        //Redireccionar
        session()->flash('exito','Producto editado correctamente.');

        redirect()->route('dashboard.producto');

        
    }

    public function render()
    {   
        
        return view('livewire.editar-producto');
    }
}
