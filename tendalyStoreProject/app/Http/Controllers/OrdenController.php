<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Negocio;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['show']);
    }

    public function exito(Orden $orden){
        $negocio = Negocio::find($orden->negocio_id);
        return view('ordenes.exito',compact('orden','negocio'));
    }
}
