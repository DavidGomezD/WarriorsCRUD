<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;
use App\Fecha;
use App\Correo;
use App\Telefono;

class EstudianteController extends Controller
{

    public function index()
    {
        //David: Almacena la informacion de la tabla estudiantes
        $datos['estudiantes']=Estudiante::all();

        //David:Retorna la vista dentro de la carpeta estudiante con nombre index
        return view('estudiante.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //David: nos manda al create
        return view('estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Inserta los datos
        $estudiante = new Estudiante;
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido_paterno = $request->apellido_paterno;
        $estudiante->apellido_materno = $request->apellido_materno;
        $estudiante->save();

        $fecha = new Fecha;
        $fecha->estudiante_id = $estudiante->id;
        $fecha->fecha_nacimiento = $request->fecha_nacimiento;
        $fecha->save();

        $telefono = new Telefono;
        $telefono->estudiante_id = $estudiante->id;
        $telefono->telefono = $request->telefono;
        $telefono->save();

        $correo = new Correo;
        $correo->estudiante_id = $estudiante->id;
        $correo->correo = $request->correo;
        $correo->save();

        return redirect('estudiante');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //David: Regresa toda la informacion con ese id
        $estudianteDatos = Estudiante::findOrFail($id);

        //David: Manda los datos a la vista estudiante.edit
        return view('estudiante.edit', compact('estudianteDatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Actualizar los datos

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

        return redirect('estudiante');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //David: Borra
        Estudiante::destroy($id);
    
        return redirect('estudiante');
    }

}
