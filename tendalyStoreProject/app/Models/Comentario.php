<?php

namespace App\Models;

use App\Models\User;
use App\Models\Negocio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{

     use HasFactory;

    protected $fillable = [
        'user_id',
        'negocio_id',
        'comentario',
        'rating'
    ];

    public function negocio(){
        return $this->belongsTo(Negocio::class,'negocio_id');
    }

    public function usuarios(){
        return $this->belongsTo(User::class,'user_id');
    }
}
