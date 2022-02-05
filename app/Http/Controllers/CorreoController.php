<?php

namespace App\Http\Controllers;

use App\Correo;
use Illuminate\Http\Request;

class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //David: Almacena la informacion de la tabla estudiantes
        $datos['correos']=Correo::all();

        //David:Retorna la vista dentro de la carpeta estudiante con nombre index
        return view('correo.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //David: nos manda al create
        return view('correo.create');
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
        $correoDatos=request()->except('_token');

        //David: Inserta los datos del formulario, en la tabla correos
        Correo::insert($correoDatos);

        //David: Nos muestra los datos guardados
        //return response()->json($correoDatos);

        return redirect('correo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Correo  $correo
     * @return \Illuminate\Http\Response
     */
    public function show(Correo $correo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Correo  $correo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //David: Regresa toda la informacion con ese id
        $correoDatos = Correo::findOrFail($id);

        //David: Manda los datos a la vista correo.edit
        return view('correo.edit', compact('correoDatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Correo  $correo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //David: Actualizar los datos
        //David: Nos manda toda la informacion menos token y method
        $correoNuevosDatos=request()->except(['_token', '_method']);
        //David: Actualiza
        Correo::where('id', '=', $id)->update($correoNuevosDatos);

        //David: Nos mostrara los datos que modificamos
        $correoDatos = Correo::findOrFail($id);

        return view('correo.edit', compact('correoDatos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Correo  $correo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //David: Borra el telefono con el id
        Correo::destroy($id);

        //David: Nos regresa a la vista estudiante
        return redirect('correo');
    }
}
