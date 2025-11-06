<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['show']);
    }

    public function store(Request $request){

        $user = auth()->user();
        $nombre_negocio = Negocio::find($request->negocio_id);

        $this->validate($request,[
            'comentario'=>'required|string|max:255',
            'rating'=>'required|integer|min:1|max:5'
        ]);

        Comentario::create([
            'user_id' => $user->id,
            'negocio_id' => $request->negocio_id,
            'comentario'=>$request->comentario,
            'rating'=>$request->rating,
        ]);
        
        return redirect()->route('negocio.show',$nombre_negocio);
    }
}
