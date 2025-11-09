<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __invoke(){
        $user = auth()->user();
        $negocios = Negocio::withAvg('comentarios', 'rating')
            ->orderByDesc('comentarios_avg_rating') 
            ->take(3) 
            ->get();

        return view('principal',compact('user','negocios'));
    }
}
