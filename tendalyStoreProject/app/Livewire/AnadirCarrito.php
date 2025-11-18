<?php

namespace App\Livewire;

use App\Models\Carrito;
use Livewire\Component;
use App\Models\CarritoItem;
use Illuminate\Support\Facades\Auth;

class AnadirCarrito extends Component
{   

    public $producto;
    public $cantidad = 1;
    public $totalCarrito;


    public function mount($producto){
        $this->producto = $producto;

        if(auth()->user()){
            $carrito = Carrito::where('user_id',auth()->user()->id)
                ->where('estado','activo')
                ->first();

            if($carrito){
                $this->totalCarrito = CarritoItem::where('carrito_id',$carrito->id)->where('producto_id',$this->producto->id)
                            ->sum('cantidad');
            }
        }
    }

    public function agregar(){

        if(!Auth::check()){
            session()->flash('error','Debes iniciar sesión para agregar productos al carrito.');
            return redirect()->route('login');
        }

        if (Auth::id() === $this->producto->negocio->user_id) {
            return redirect()->route('negocio.show', $this->producto->negocio->nombre)->with('error', 'No puedes agregar productos de tu propio negocio.');
        }

        $user = auth()->user();
        
        $carrito = Carrito::firstOrCreate(
            ['user_id'=>$user->id,'estado'=>'activo']
        );

        $item = CarritoItem::where('carrito_id',$carrito->id)
            ->where('producto_id', $this->producto->id)
            ->first();

        if($item){
            //Buscamos actualizar la cantidad
            $nuevaCantidad = $item->cantidad + $this->cantidad;
            
            if($nuevaCantidad > $this->producto->stock ){
                session()->flash('error','No hay suficiente stock disponible.');
                return redirect()->route('negocio.show',$this->producto->negocio->nombre);
            }
            
            
            $item->update([
                'cantidad'=>$nuevaCantidad,
                'subtotal'=>$nuevaCantidad * $item->precio_unitario,
            ]);
        }else{

            $precioUnitario = ($this->producto->precio_oferta && $this->producto->precio_oferta>0 ? $this->producto->precio_oferta : $this->producto->precio );

            CarritoItem::create([
                'carrito_id'=>$carrito->id,
                'negocio_id'=>$this->producto->negocio_id,
                'producto_id'=>$this->producto->id,
                'cantidad'=>$this->cantidad,
                'precio_unitario'=> $precioUnitario ,
                'subtotal'=>$this->cantidad * $precioUnitario,
            ]);
        }

        $this->totalCarrito = CarritoItem::where('carrito_id',$carrito->id)->where('producto_id',$this->producto->id)->sum('cantidad');

        $this->dispatch(
            'mostrar-alerta',
            type: 'success',
            message: 'Producto agregado correctamente al carrito.'
        );

        $this->cantidad = 1; 
      
        
    }

    public function render()
    {
        return view('livewire.anadir-carrito');
    }
}
