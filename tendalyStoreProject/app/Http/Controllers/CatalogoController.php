<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Negocio;

class CatalogoController extends Controller
{

    

    public function index(){
        $negocios = Negocio::all();
        return view('catalogo',compact('negocios'));
    }
}
