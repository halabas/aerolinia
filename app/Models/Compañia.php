<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compañia extends Model
{
    use HasFactory;

    public function compañia(){
        return $this->hasMany(Vuelo::class);
    }
}
