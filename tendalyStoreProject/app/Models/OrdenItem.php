<?php

namespace App\Models;

use App\Models\Orden;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;

class OrdenItem extends Model
{
    protected $table = 'orden_items';

    protected $fillable = [
        'orden_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];

    public function orden(){
        return $this->belongsTo(Orden::class,'orden_id');
    }

    public function productos(){
        return $this->belongsTo(Producto::class);
    }
}
