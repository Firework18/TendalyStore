<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class NegocioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        
    }

    public function create(){
        $departamentos = Departamento::with('provincias.distritos')->get();
        return view('negocios.create',compact('departamentos'));
    }
}
