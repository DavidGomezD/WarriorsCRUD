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

    public function guardar($request)
    {
        $estudiante = new Estudiante;
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido_paterno = $request->apellido_paterno;
        $estudiante->apellido_materno = $request->apellido_materno;
        $estudiante->save();

        $guardarFecha = new Fecha;
        $guardarFecha->guardar($request, $estudiante->id);

        $guardarTelefono = new Telefono;
        $guardarTelefono->guardar($request, $estudiante->id);

        $guardarCorreo = new Correo;
        $guardarCorreo->guardar($request, $estudiante->id);
        
    }

    public function actualizar($request, $id)
    {
        $estudiante = Estudiante::find($id);
        
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido_paterno = $request->apellido_paterno;
        $estudiante->apellido_materno = $request->apellido_materno;
        $estudiante->save();

        $estudiante->fecha->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->fecha->save();

        $estudiante->telefono->telefono = $request->telefono;
        $estudiante->telefono->save();

        $estudiante->correo->correo = $request->correo;
        $estudiante->correo->save();
    }

}
