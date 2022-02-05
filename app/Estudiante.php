<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class Estudiante extends Model
{

    //Relacion 1 a 1 con fecha
    public function fecha(){
        return $this->hasOne('App\Fecha');
    }
    
    //Relacion 1 a 1 con telefono
    public function telefono(){
        return $this->hasOne('App\Telefono');
    }

    //Relacion 1 a 1 con correo
    public function correo(){
        return $this->hasOne('App\Correo');
    }
}
