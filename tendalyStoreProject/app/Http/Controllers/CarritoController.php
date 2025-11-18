<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function index()
    {
        $carrito = Carrito::where('user_id', auth()->user()->id)->first();

        if (!$carrito) {
            $carrito = new Carrito();
            $carrito->items = collect();
        }

        return view('carrito.carrito-items', [
            'carrito' => $carrito,
            'items' => $carrito->items
        ]);

    }
}
