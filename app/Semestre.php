<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
use App\Grupo;

class Semestre extends Model
{
    //Relacion uno a muchos (un semestre tiene muchos grupos)
    public function grupos(){
        return $this->hasMany(Grupo::class);
    }
}
