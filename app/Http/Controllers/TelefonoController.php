<?php

namespace App\Http\Controllers;

use App\Telefono;
use Illuminate\Http\Request;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //David: Almacena la informacion de la tabla telefonos
        $datos['telefonos']=Telefono::all();

        //David:Retorna la vista dentro de la carpeta telefono con nombre index
        return view('telefono.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //David: nos manda al create
        return view('telefono.create');
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
        $telefonoDatos=request()->except('_token');

        //David: Inserta los datos del formulario, en la tabla estudiantes 
        Telefono::insert($telefonoDatos);

        //David: Nos muestra los datos guardados
        //return response()->json($telefonoDatos);

        return redirect('telefono');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function show(Telefono $telefono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //David: Regresa toda la informacion con ese id
        $telefonoDatos = Telefono::findOrFail($id);

        //David: Manda los datos a la vista telefono.edit
        return view('telefono.edit', compact('telefonoDatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //David: Actualizar los datos
        //David: Nos manda toda la informacion menos token y method
        $telefonoNuevosDatos=request()->except(['_token', '_method']);
        //David: Actualiza
        Telefono::where('id', '=', $id)->update($telefonoNuevosDatos);

        //David: Nos mostrara los datos que modificamos
        $telefonoDatos = Telefono::findOrFail($id);

        return view('telefono.edit', compact('telefonoDatos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //David: Borra el telefono con el id
        Telefono::destroy($id);

        //David: Nos regresa a la vista estudiante
        return redirect('telefono');
    }
}
