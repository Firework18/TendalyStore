<?php

namespace App\Models;

use App\Models\Distrito;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provincia extends Model
{
    /** @use HasFactory<\Database\Factories\ProvinciaFactory> */
    use HasFactory;

    protected $fillable= ['nombre','departamento_id'];

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }

    public function distritos(){
        return $this->hasMany(Distrito::class);
    }
}
