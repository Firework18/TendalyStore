<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
