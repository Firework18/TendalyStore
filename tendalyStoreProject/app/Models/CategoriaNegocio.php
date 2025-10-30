<?php

namespace App\Models;

use App\Models\Negocio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoriaNegocio extends Model
{
    /** @use HasFactory<\Database\Factories\CategoriaNegocioFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion'];
    
    public function negocios(){
        return $this->hasMany(Negocio::class);
    }
}
