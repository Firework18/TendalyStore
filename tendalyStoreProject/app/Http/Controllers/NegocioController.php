<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use App\Models\Producto;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\CategoriaNegocio;

class NegocioController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index']);
    }

    public function index(Negocio $negocio){
        $productos = Producto::where('negocio_id',$negocio->id);
        return view('negocios.negocio',[
            'negocio'=>$negocio
        ],compact('productos'));
    }

    public function create(){
        $departamentos = Departamento::with('provincias.distritos')->get();
        $categorias = CategoriaNegocio::all();
        return view('negocios.create',compact('departamentos','categorias'));
    }

    public function store(Request $request){
        $this->validate($request,[
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
            'imagen'=>'required'
            
        ]);
        
        Negocio::create([
            'nombre'=> $request->nombre,
            'descripcion'=> $request->descripcion,
            'historia'=> $request->historia,
            'categoria_negocio_id'=> $request->categoria_negocio_id,
            'ubicacion'=> $request->ubicacion,
            'departamento_id'=> $request->departamento_id,
            'provincia_id'=> $request->provincia_id,
            'distrito_id'=> $request->distrito_id,
            "correo"=>$request->correo,
            'telefono'=>$request->telefono,
            'imagen'=> $request->imagen,
            'user_id'=> auth()->user()->id
        ]);

        return redirect()->route('post.index',auth()->user()->username);

    }
}
