<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;

    public function aeropuerto_llegada(){
        return $this->belongsTo(Aeropuerto::class,'aeropuerto_llegada_id');
    }

    public function aeropuerto_salida(){
        return $this->belongsTo(Aeropuerto::class,'aeropuerto_salida_id');
    }

    public function compañia(){
        return $this->belongsTo(Compañia::class);
    }

    public function billetes(){
        return $this->hasMany(Billete::class);
    }
}
