<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    //Relacion 1 a 1 inversa (Corregir a 1:N inversa)
    public function estudiante(){
        return $this->belongsTo('App\Estudiante');
    }
}
