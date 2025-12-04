<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;

class DireccionesController extends Controller
{   
    public function __construct(){
        $this->middleware('auth')->except(['show']);
    }
    
    public function index(){
        $direcciones = Direccion::where('user_id',auth()->user()->id)->get();
        return view('dashboard.user.direcciones.index',compact('direcciones'));
    }

    public function create(){
        return view('dashboard.user.direcciones.create');
    }

    public function edit(Direccion $direccion){
        return view('dashboard.user.direcciones.edit',compact('direccion'));
    }

}
