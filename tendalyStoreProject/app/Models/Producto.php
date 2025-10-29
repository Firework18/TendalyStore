<?php

namespace App\Models;

use App\Models\Negocio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    /** @use HasFactory<\Database\Factories\ProductoFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'precio',
        'stock',
        'negocio_id',
        'estado',
        'precio_oferta',
        'unidad_medida',
    ];

    public function negocio(){
        return $this->belongsTo(Negocio::class);
    }
}
