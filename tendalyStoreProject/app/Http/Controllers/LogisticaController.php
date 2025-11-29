<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogisticaController extends Controller
{
    public function create(){
        return view('dashboard.user.logistica.create');
    }
}
