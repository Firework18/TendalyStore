<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Negocio extends Model
{
    /** @use HasFactory<\Database\Factories\NegocioFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'historia',
        'categoria_negocio_id',
        'ubicacion',
        'departamento_id',
        'provincia_id',
        'distrito_id',
        'correo',
        'telefono',
        'imagen',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
