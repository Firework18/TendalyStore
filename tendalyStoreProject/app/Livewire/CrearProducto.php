<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithFileUploads;

class CrearProducto extends Component
{
    public $nombre;
    public $descripcion;
    public $precio;
    public $precio_oferta = 0;
    public $stock;
    public $unidad_medida;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        "nombre" => 'required|string',
        'descripcion' => 'required',
        "precio" => 'required',
        'precio_oferta'=>'nullable|numeric',
        'stock' => 'required',
        'unidad_medida' => 'required',
        'imagen' => 'nullable|image',
    ];

    public function crearProducto()
    {
        $datos = $this->validate();

        //Almacenar la imagen
        $imagen = $this->imagen->store('productos', 'public');
        $datos['imagen'] = basename($imagen);

        //Crear la vacante
        Producto::create([
            'nombre'=> $datos['nombre'] ,
            'descripcion'=> $datos['descripcion'] ,
            'imagen'=> $datos['imagen'] ,
            'precio'=> $datos['precio'] ,
            'precio_oferta'=> $datos['precio_oferta'] ,
            'stock'=> $datos['stock'] ,
            'negocio_id'=> auth()->user()->negocios->id ,
            'unidad_medida'=> $datos['unidad_medida'] ,
                
        ]);
        //Crear un mensaje
        session()->flash('exito','Producto creado correctamente.');
        //Redireccionar
        return redirect()->route('dashboard.producto');
    }

    public function render()
    {
        return view('livewire.crear-producto');
    }
}
