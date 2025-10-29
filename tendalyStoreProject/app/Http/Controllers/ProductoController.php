<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index']);
    }

    public function create(){
        return view('productos.create');
    }

}
