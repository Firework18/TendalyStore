<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use Illuminate\Http\Request;
use App\Models\CategoriaNegocio;

class CatalogoController extends Controller
{

    public function index(){
        $negocios = Negocio::paginate(9);
        $categorias = CategoriaNegocio::get();
        return view('catalogo',compact('negocios','categorias'));
    }
}
