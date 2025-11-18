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

    public function show(Producto $producto){

        $negocio = Negocio::find($producto->negocio_id);

        return view('negocios.producto',compact('producto','negocio'));
    }

    public function productoDashboard(){
        $negocio = auth()->user()->negocios;
        $productos = $negocio ? Producto::where('negocio_id',$negocio->id)->paginate(4) : collect();
        $productosEliminados = $negocio ? Producto::onlyTrashed()->where('negocio_id',$negocio->id)->paginate(4) : collect(); 
        return view('dashboard.user.productos.productos',compact('productos','negocio','productosEliminados'));
    }

    public function create(){
        return view('dashboard.user.productos.create');
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
        
        return redirect()->route('dashboard.negocio');
    }

    public function edit(Producto $producto){
        
        $this->authorize('update',$producto);

        return view('dashboard.user.productos.edit',compact('producto'));
    }

    public function destroy(Producto $producto){

        $this->authorize('delete',$producto);
        $producto->delete();
        
        return redirect()->back()->with('success','Producto eliminado correctamente');
        
    }

    public function restore($id){
        $producto = Producto::onlyTrashed()->findOrFail($id);
        $producto->restore();

        return back()->with('status','Producto restaurado con éxito');
    }

}
