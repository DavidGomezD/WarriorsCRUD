<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
use App\Grupo;

class Turno extends Model
{
    //Relacion uno a muchos (un turno tiene muchos grupos)
    public function grupos(){
        return $this->hasMany(Grupo::class);
    }

    public function guardar($request)
    {
        $turno = new Turno;
        $turno->turno = $request->turno;
        $turno->save();
    }
}
