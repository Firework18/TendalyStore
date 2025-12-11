<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orden;
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

        $misCompras = Orden::where('user_id', $user->id)
            ->with('tags') 
            ->latest()
            ->take(5)
            ->get();

        $ultimaCompra = $misCompras->first();

        $comprasActivas = Orden::where('user_id', $user->id)
            ->whereHas('tags', function($q) {
                $q->whereIn('nombre', ['pendiente', 'pagado', 'en camino', 'preparando']); 
            })->count();

        
        $negocio = $user->negocios()->first(); 

        $ventasRecientes = collect();
        $statsNegocio = [
            'ingresos' => 0,
            'pedidos_nuevos' => 0,
            'total_ventas' => 0
        ];

        if ($negocio) {
            $ventasRecientes = Orden::where('negocio_id', $negocio->id)
                ->with(['usuario', 'tags']) //traemos datos del cliente y estado
                ->latest()
                ->take(5)
                ->get();

            $statsNegocio['total_ventas'] = Orden::where('negocio_id', $negocio->id)->count();
            
            $statsNegocio['ingresos'] = Orden::where('negocio_id', $negocio->id)->sum('total');
            
            $statsNegocio['pedidos_nuevos'] = Orden::where('negocio_id', $negocio->id)
                ->whereHas('tags', function($q){
                    $q->where('nombre', 'pendiente'); 
                })->count();
        }

        return view('dashboard.user.principal', compact(
            'user', 
            'negocio', 
            'misCompras', 
            'ultimaCompra', 
            'comprasActivas',
            'ventasRecientes',
            'statsNegocio'
        ));
    }

    public function perfil(){
        $user = auth()->user();
        return view('dashboard.user.perfil',compact('user'));
    }

    public function store(Request $request){

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

        return redirect()->route('dashboard.perfil')->with('success','Perfil editado correctamente');

    }

    
}
