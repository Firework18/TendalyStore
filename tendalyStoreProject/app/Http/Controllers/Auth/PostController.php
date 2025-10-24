<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(User $user){
        
        return view('muro',[
            'user'=>$user
        ]);
    }

}
