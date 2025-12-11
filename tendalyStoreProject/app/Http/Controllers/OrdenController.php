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

    public function cliente(){
    
        return view('dashboard.user.cliente.mis_pedidos');
    }

    public function detalleCliente(Orden $orden){

        $this->authorize('view',$orden);

        return view('dashboard.user.cliente.orden_detalle',compact('orden'));

    }

    #Negocio
    public function negocio(){

        return view('dashboard.user.negocio.mis_ventas');
    }

    public function detalleNegocio(Orden $orden){

        $this->authorize('view',$orden);

        return view('dashboard.user.cliente.orden_detalle',compact('orden'));

    }
}
