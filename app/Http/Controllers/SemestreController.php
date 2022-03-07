<?php

namespace App\Http\Controllers;

use App\Semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    //Manda al index
    public function index()
    {
        //$semestres = tabla semestres
        $semestres = Semestre::all();

        return view('semestre.index')
            ->with('semestres', $semestres);
    }

    //Manda al create
    public function create()
    {
        return view('semestre.create');
    }

    //Guarda el semestre en tabla semestres
    public function store(Request $request)
    {
        $semestre = new Semestre;
        $semestre->guardar($request);

        return redirect('semestre');
    }
        
    public function edit($id)
    {
        //$semestreDatos = Semestre con el id
        $semestreDatos = Semestre::find($id);

        //David: Manda los datos a la vista semestre.edit
        return view('semestre.edit')
            ->with('semestreDatos', $semestreDatos);
    }
   
    //Actualiza
    public function update(Request $request, $id)
    {
        $semestreNuevosDatos=request()->except(['_token', '_method']);
        Semestre::where('id', '=', $id)->update($semestreNuevosDatos);

        return redirect('semestre');
    }

    //Borra el semestre con el id que mandemos
    public function destroy($id)
    {
        Semestre::destroy($id);

        return redirect('semestre');
    }
}
