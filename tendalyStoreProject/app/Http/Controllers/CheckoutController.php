<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{   

    public function __construct(){
        $this->middleware('auth')->except(['show']);
    }

    public function index(Negocio $negocio){
        return view('ordenes.checkout',compact('negocio'));
    }
}
