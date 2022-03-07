<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Semestre;
use App\Turno;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //David: Almacena la informacion de la tabla grupos
        $datos['grupos']=Grupo::all();

        //David:Retorna la vista dentro de la carpeta grupo con nombre index
        return view('grupo.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Almacena toda la informacion de la tabla semestres
        $semestres = Semestre::all();

        //Almacena toda la informacion de la tabla turnos
        $turnos = Turno::all();

        //David: nos manda al create
        return view('grupo.create')
            ->with('semestres', $semestres)
            ->with('turnos', $turnos);
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
        $grupoDatos=request()->except('_token');

        //David: Inserta los datos del formulario, en la tabla grupos
        Grupo::insert($grupoDatos);

        return redirect('grupo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Regresa toda la informacion con ese id
        $grupoDatos = Grupo::findOrFail($id);

        //Almacena toda la informacion de la tabla semestres
        $semestres = Semestre::all();

        //Almacena toda la informacion de la tabla turnos
        $turnos = Turno::all();

        //Manda los datos a la vista grupo.edit
        return view('grupo.edit')
            ->with('grupoDatos', $grupoDatos) //Manda la variable
            ->with('semestres', $semestres)
            ->with('turnos', $turnos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //David: Actualizar los datos
        //David: Nos manda toda la informacion menos token y method
        $grupoNuevosDatos=request()->except(['_token', '_method']);

        //David: Actualiza
        Grupo::where('id', '=', $id)->update($grupoNuevosDatos);

        //David: Nos mostrara los datos que modificamos
        $grupoDatos = Grupo::findOrFail($id);

        //David: Nos regresa a la vista semestre
        return redirect('grupo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //David: Borra el semestre con el id
        Grupo::destroy($id);

        //David: Nos regresa a la vista grupo
        return redirect('grupo');
    }
}
