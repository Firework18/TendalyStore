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
        $negocio = Negocio::find($request->negocio_id);

        $this->validate($request,[
            'comentario'=>'required|string|max:255',
            'rating'=>'required|integer|min:1|max:5'
        ]);

        $yaComento = Comentario::where('user_id',auth()->id())
                        ->where('negocio_id',$request->negocio_id)
                        ->exists();

        if($yaComento){
            return redirect()->route('negocio.show',$negocio)->with('error','Ya has dejado un comentario en este negocio');
        }

        Comentario::create([
            'user_id' => $user->id,
            'negocio_id' => $request->negocio_id,
            'comentario'=>$request->comentario,
            'rating'=>$request->rating,
        ]);
        
        return redirect()->route('negocio.show',$negocio)->with('success','Comentario enviado correctamente');
    }
}
