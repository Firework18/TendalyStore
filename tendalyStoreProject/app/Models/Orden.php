<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Orden;
use App\Models\Negocio;
use App\Models\OrdenItem;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';

    protected $fillable = [
        'user_id',
        'negocio_id',
        'direccion_entrega',
        'telefono',
        'referencia',
        'codigo',
        'tipo_entrega',
        'costo_envio',
        'total',
        'estado',
        'imagen_pago'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($orden) {

            $ultimo = Orden::latest('id')->first();
            $nuevoNumero = $ultimo ? $ultimo->id + 1 : 1;

            //Formato: O-0001
            $orden->codigo = 'O-' . str_pad($nuevoNumero, 4, '0', STR_PAD_LEFT);
        });
    }

    public function usuario(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function negocio(){
        return $this->belongsTo(Negocio::class);
    }

    public function items(){
        return $this->hasMany(OrdenItem::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'orden_tag')->withTimestamps();
    }
}
