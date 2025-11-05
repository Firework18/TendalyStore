<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = auth()->user();
        return view('dashboard.user.principal',compact('user'));
    }

    public function perfil(){
        $user = auth()->user();
        return view('dashboard.user.perfil',compact('user'));
    }

    
}
