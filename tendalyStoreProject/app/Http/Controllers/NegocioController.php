<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\CategoriaNegocio;

class NegocioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        
    }

    public function create(){
        $departamentos = Departamento::with('provincias.distritos')->get();
        $categorias = CategoriaNegocio::all();
        return view('negocios.create',compact('departamentos','categorias'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'nombreNegocio'=> 'required|max:255',
            'descripcionNegocio'=> 'required|string|max:500',
            'historiaNegocio'=> 'required|string|max:1000',
            'categoria'=> 'required|exists:categoria_negocios,id',
            'direccionCompleta'=> 'required|max:255',
            'departamento'=> 'required|exists:departamentos,id',
            'provincia'=> 'required|exists:provincias,id',
            'distrito'=> 'required|exists:distritos,id',
            "emailNegocio"=>'required|email|max:255|unique:negocios,direccion',
            'telefonoNegocio'=>'required'
            
        ]);
        dd('Creando Negocio :D');
    }
}
