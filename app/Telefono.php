<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    //Relacion 1 a 1 inversa
    public function estudiante(){
        return $this->belongsTo('App\Estudiante');
    }

    public function guardar($request, $estudianteId)
    {
        $telefono = new Telefono;
        $telefono->estudiante_id = $estudianteId;
        $telefono->telefono = $request->telefono;
        $telefono->save();
    }
}
