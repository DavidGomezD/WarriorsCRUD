<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //David: Evita que se mande el _token
        $estudianteDatos=request()->except('_token');

        //David: Inserta los datos del formulario, en la tabla estudiantes 
        Estudiante::insert($estudianteDatos);

        //David: Nos muestra los datos guardados
        //return response()->json($estudianteDatos);

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
        //David: Actualizar los datos
        //David: Nos manda toda la informacion menos token y method
        $estudianteNuevosDatos=request()->except(['_token', '_method']);
        //David: Actualiza
        Estudiante::where('id', '=', $id)->update($estudianteNuevosDatos);

        //David: Nos mostrara los datos que modificamos
        $estudianteDatos = Estudiante::findOrFail($id);

        return view('estudiante.edit', compact('estudianteDatos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //David: Borra el estudiante con el id
        Estudiante::destroy($id);

        //David: Nos regresa a la vista estudiante
        return redirect('estudiante');
    }
}
