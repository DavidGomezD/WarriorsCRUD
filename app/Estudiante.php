<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
use App\Fecha;
use App\Telefono;
use App\Correo;
use App\Grupo;

class Estudiante extends Model
{
    //Relaciones 1 a 1 fecha, telefono y correo

    public function fecha(){
        return $this->hasOne(Fecha::class);
    }

    public function telefono(){
        return $this->hasOne(Telefono::class);
    }

    public function correo(){
        return $this->hasOne(Correo::class);
    }

    //Relacion muchos a muchos

    public function grupos(){
        return $this->belongsToMany(Grupo::class);
    }

    //Fin relaciones

}
