<?php

namespace App\Models;

use App\Models\Distrito;
use App\Models\Producto;
use App\Models\Provincia;
use App\Models\Departamento;
use App\Models\CategoriaNegocio;
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaNegocio::class, 'categoria_negocio_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
