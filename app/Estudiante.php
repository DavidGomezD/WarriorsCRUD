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

    public function guardarDatosEstudiante($request)
    {
        $this->nombre = $request->nombre;
        $this->apellido_paterno = $request->apellido_paterno;
        $this->apellido_materno = $request->apellido_materno;
        $this->save();

        $fecha = new Fecha;
        $fecha->estudiante_id = $this->id;
        $fecha->fecha_nacimiento = $request->fecha_nacimiento;
        $fecha->save();
        
        $telefono = new Telefono;
        $telefono->estudiante_id = $this->id;
        $telefono->telefono = $request->telefono;
        $telefono->save();

        $correo = new Correo;
        $correo->estudiante_id = $this->id;
        $correo->correo = $request->correo;
        $correo->save();
    }

    public function actualizarDatosEstudiante($request)
    {   
        $this->nombre = $request->nombre;
        $this->apellido_paterno = $request->apellido_paterno;
        $this->apellido_materno = $request->apellido_materno;
        $this->save();

        $this->fecha->fecha_nacimiento = $request->fecha_nacimiento;
        $this->fecha->save();

        $this->telefono->telefono = $request->telefono;
        $this->telefono->save();

        $this->correo->correo = $request->correo;
        $this->correo->save();
    }

}
