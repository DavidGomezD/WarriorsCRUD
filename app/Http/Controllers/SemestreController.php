<?php

namespace App\Http\Controllers;

use App\Semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //David: Almacena la informacion de la tabla semestres
        $datos['semestres']=Semestre::all();

        //David:Retorna la vista dentro de la carpeta semestre con nombre index
        return view('semestre.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //David: nos manda al create
        return view('semestre.create');
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
        $semestreDatos=request()->except('_token');

        //David: Inserta los datos del formulario, en la tabla semestres
        Semestre::insert($semestreDatos);

        return redirect('semestre');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function show(Semestre $semestre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //David: Regresa toda la informacion con ese id
        $semestreDatos = Semestre::findOrFail($id);

        //David: Manda los datos a la vista semestre.edit
        return view('semestre.edit', compact('semestreDatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //David: Actualizar los datos
        //David: Nos manda toda la informacion menos token y method
        $semestreNuevosDatos=request()->except(['_token', '_method']);

        //David: Actualiza
        Semestre::where('id', '=', $id)->update($semestreNuevosDatos);

        //David: Nos mostrara los datos que modificamos
        $semestreDatos = Semestre::findOrFail($id);

        //David: Nos regresa a la vista semestre
        return redirect('semestre');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //David: Borra el semestre con el id
        Semestre::destroy($id);

        //David: Nos regresa a la vista semestre
        return redirect('semestre');
    }
}
