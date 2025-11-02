<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index']);
    }

    public function create(){
        return view('productos.create');
    }

    public function store(Request $request){
       
        $this->validate($request,[
            'nombre'=>'required',
            'descripcion'=>'required|string|max:500',
            'imagen'=>'required',
            'precio'=>'required',
            'stock'=>'required',
            'unidad_medida'=>'required',
        ]);
    


        Producto::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'imagen'=>$request->imagen,
            'precio'=>$request->precio,
            'stock'=>$request->stock,
            'negocio_id'=>auth()->user()->negocios->id,
            'unidad_medida'=>$request->unidad_medida,
        ]);
        
        return redirect()->route('negocio.index',auth()->user()->negocios);
    }

}
