<?php

namespace App\Models;

use App\Models\User;
use App\Models\Provincia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Distrito extends Model
{
    /** @use HasFactory<\Database\Factories\DistritoFactory> */
    use HasFactory;

    protected $fillable = ['nombre','provincia_id'];

    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }

    public function usuarios(){
        return $this->belongsTo(User::class);
    }
}
