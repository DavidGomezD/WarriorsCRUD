<?php

namespace App\Http\Controllers;

use App\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //David: Almacena la informacion de la tabla turno
        $datos['turnos']=Turno::all();

        //David:Retorna la vista dentro de la carpeta turno con nombre index
        return view('turno.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //David: nos manda al create
        return view('turno.create');
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
        $turnoDatos=request()->except('_token');

        //David: Inserta los datos del formulario, en la tabla turno
        Turno::insert($turnoDatos);

        return redirect('turno');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show(Turno $turno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //David: Regresa toda la informacion con ese id
        $turnoDatos = Turno::findOrFail($id);

        //David: Manda los datos a la vista turno.edit
        return view('turno.edit', compact('turnoDatos'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //David: Actualizar los datos
        //David: Nos manda toda la informacion menos token y method
        $turnoNuevosDatos=request()->except(['_token', '_method']);

        //David: Actualiza
        Turno::where('id', '=', $id)->update($turnoNuevosDatos);

        //David: Nos mostrara los datos que modificamos
        $turnoDatos = Turno::findOrFail($id);

        //David: Nos regresa a la vista turno
        return redirect('turno');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //David: Borra el turno con el id
        Turno::destroy($id);

        //David: Nos regresa a la vista turno
        return redirect('turno');
    }
}
