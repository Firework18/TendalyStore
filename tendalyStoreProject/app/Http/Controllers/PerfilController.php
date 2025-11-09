<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Negocio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

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

    public function store(Request $request){

        //Modificar el request evitando usuarios duplicados
        $request->request->add(['username'=> Str::slug($request->username)]);

        $this->validate($request,[
            'username'=>['required','unique:users,username,'.auth()->user()->id,'min:3','max:12','not_in:facebook,twitter,perfil'],
            'name'=>['required','min:3','max:20'],
        ]);

        if($request->imagen){
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::read($imagen)->resize(1200,1000);

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);

        }
        
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? $usuario->imagen ?? null ;
        $usuario->name = $request->name;
        $usuario->apellido_paterno = $request->apellido_paterno;
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->informacion = $request->informacion;
        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;

        $usuario->save();

        //Redireccionar
        return redirect()->route('dashboard.perfil')->with('success','Perfil editado correctamente');

    }

    
}
