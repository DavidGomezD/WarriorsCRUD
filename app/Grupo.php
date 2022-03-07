<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
use App\Turno;
use App\Semestre;
use App\Estudiante;

class Grupo extends Model
{
    //Relacion uno a muchos inversva

    public function turno(){
        return $this->belongsTo(Turno::class);
    }

    public function semestre(){
        return $this->belongsTo(Semestre::class);
    }

    //Relacion muchos a muchos

    public function estudiantes(){
        return $this->belongsToMany(Estudiante::class);
    }

    //Fin de relaciones

}
