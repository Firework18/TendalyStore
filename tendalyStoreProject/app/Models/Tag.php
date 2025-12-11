<?php

namespace App\Models;

use App\Models\Orden;
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

    public function ordenes(){
        return $this->belongsToMany(Orden::class,'orden_tag')->withTimestamps();
    }
}
