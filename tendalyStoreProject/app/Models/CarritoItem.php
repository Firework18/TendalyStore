<?php

namespace App\Models;

use App\Models\Carrito;
use App\Models\Negocio;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarritoItem extends Pivot
{
    use HasFactory;


    protected $fillables = [
        'carrito_id',
        'negocio_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal'
    ];

    public function producto(){
        return $this->belongsTo(Producto::class,'producto_id');
    }

    public function negocio(){
        return $this->belongsTo(Negocio::class);
    }

    public function carrito(){
        return $this->belongsTo(Carrito::class);
    }
}
