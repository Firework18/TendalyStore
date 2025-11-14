<?php

namespace App\Models;

use App\Models\User;
use App\Models\CarritoItem;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $fillable=[
        'user_id',
        'estado',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->hasMany(CarritoItem::class);
    }
}
