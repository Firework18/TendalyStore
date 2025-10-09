<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
    return view('register');
    }

    public function store(Request $request){
        //dd($request);
        //dd($request->get('name'));

        //Validación
        $request->validate([
            'name'=>'required|max:30',
            'username'=>'required|unique:users|min:3|max:20',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required',
            'password_confirmation'=>'required'
        ]);

    }
};
