<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    //Relacion 1 a 1 inversa
    public function estudiante(){
        return $this->belongsTo('App\Estudiante');
    }
}
