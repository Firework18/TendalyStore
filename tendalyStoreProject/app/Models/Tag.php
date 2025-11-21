<?php

namespace App\Models;

use App\Models\Negocio;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'nombre',
        'color',
    ];

    public function negocios(){
        return $this->belongsToMany(Negocio::class);
    }
}
