<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billete extends Model
{
    use HasFactory;

    protected $fillable= ['vuelo_id','user_id','asiento'];
    public function vuelo(){
        return $this->belongsTo(Vuelo::class);
    }
}
