<?php

namespace App\Models;

use App\Models\Negocio;
use App\Models\CarritoItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    /** @use HasFactory<\Database\Factories\ProductoFactory> */
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'precio',
        'stock',
        'negocio_id',
        'unidad_medida',
    ];

    public function negocio(){
        return $this->belongsTo(Negocio::class);
    }

    public function carritoItems(){
        return $this->hasMany(CarritoItem::class);
    }
}
