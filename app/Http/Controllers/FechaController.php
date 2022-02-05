<?php

namespace App\Http\Controllers;

use App\Fecha;
use Illuminate\Http\Request;

class FechaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //David: Almacena la informacion de la tabla fechas
        $datos['fechas']=Fecha::all();

        //David:Retorna la vista dentro de la carpeta fecha con nombre index
        return view('fecha.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //David: nos manda al create
        return view('fecha.create');
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
        $fechaDatos=request()->except('_token');

        //David: Inserta los datos del formulario, en la tabla estudiantes 
        Fecha::insert($fechaDatos);

        //David: Nos muestra los datos guardados
        //return response()->json($fechaDatos);

        return redirect('fecha');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function show(Fecha $fecha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //David: Regresa toda la informacion con ese id
        $fechaDatos = Fecha::findOrFail($id);

        //David: Manda los datos a la vista fecha.edit
        return view('fecha.edit', compact('fechaDatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //David: Actualizar los datos
        //David: Nos manda toda la informacion menos token y method
        $fechaNuevosDatos=request()->except(['_token', '_method']);
        //David: Actualiza
        Fecha::where('id', '=', $id)->update($fechaNuevosDatos);

        //David: Nos mostrara los datos que modificamos
        $fechaDatos = Fecha::findOrFail($id);

        return view('fecha.edit', compact('fechaDatos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //David: Borra el telefono con el id
        Fecha::destroy($id);

        //David: Nos regresa a la vista estudiante
        return redirect('fecha');
    }
}
