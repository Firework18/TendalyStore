<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use App\Models\Producto;
use App\Models\Comentario;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\CategoriaNegocio;

class NegocioController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['show']);
    }

    public function show(Negocio $negocio){
        $negociosSimilares = Negocio::where('categoria_negocio_id',$negocio->categoria_negocio_id)
                                ->where('id','!=',$negocio->id)
                                ->take(4)
                                ->get();
        $productos = Producto::where('negocio_id', $negocio->id)->paginate(4);
        $categoria = CategoriaNegocio::where('id', $negocio->categoria_negocio_id)->get();
        
     

        $user_id = auth()->id();

        $comentarios = Comentario::where('negocio_id', $negocio->id)
                        ->orderByRaw('CASE WHEN user_id = ? THEN 0 ELSE 1 END',[$user_id])
                        ->get();

        $puntuacion = number_format($comentarios->avg('rating'),1);

        $comentarioUsuario = Comentario::where('negocio_id',$negocio->id)
                                ->where('user_id',$user_id)
                                ->first();

        return view('negocios.negocio', compact('negocio', 'productos', 'categoria', 'comentarios','comentarioUsuario','puntuacion','negociosSimilares'));
    }


    public function negocioDashboard(){
        $negocio = auth()->user()->negocios;

        $ultimasOrdenes = collect();

        if ($negocio) {
            $ultimasOrdenes = $negocio->ordenes()
                ->with(['usuario', 'tags'])
                ->latest()
                ->take(5) 
                ->get();
        }

        return view('dashboard.user.negocio', compact('negocio', 'ultimasOrdenes'));
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
        session()->flash('exito','¡Negocio creado con éxito!');
        return redirect()->route('dashboard.negocio');

    }

    public function edit(Negocio $negocio){
        
        $this->authorize('update',$negocio);

        return view('negocios.edit',compact('negocio'));
    }
}
