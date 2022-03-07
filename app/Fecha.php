<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    //Relacion 1 a 1 inversa (Corregir a 1:N inversa)
    public function estudiante()
    {
        return $this->belongsTo('App\Estudiante');
    }

    public function guardar($request, $estudianteId)
    {
        $fecha = new Fecha;
        $fecha->estudiante_id = $estudianteId;
        $fecha->fecha_nacimiento = $request->fecha_nacimiento;
        $fecha->save();
    }
}
