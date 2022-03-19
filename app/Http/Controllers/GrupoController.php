<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Semestre;
use App\Turno;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    //Manda al index
    public function index()
    {
        //$grupos = tabla grupos 
        $grupos = Grupo::all();

        return view('grupo.index')
            ->with('grupos', $grupos);
    }

    //Manda al create
    public function create()
    {
        //$semestres = tabla semestres
        $semestres = Semestre::all();

        //$turnos = tabla turnos
        $turnos = Turno::all();

        //David: nos manda al create
        return view('grupo.create')
            ->with('semestres', $semestres)
            ->with('turnos', $turnos);
    }

    //Guarda el grupo en la tabla grupos
    public function store(Request $request)
    {
        //Valida los datos del $request
        $validated = $request->validate([
            'grupo' => 'required|max:100|regex:/^.{1,100}$/', // el " . " es cualquier caracter menos nueva linea (enter)
            'turno_id' => 'required|numeric|regex:/^[1-9]{1}$/', // solo hay 3 turnos, se deja 6 de margen de error (alteración de tabla)
            'semestre_id' => 'required|numeric|regex:/^[0-9]{1,2}$/', //solo hay 12 semestres aprox, se deja 88 de margen de error (alteración de tabla)
        ]);

        $guardar = new Grupo;
        $guardar->guardar($request);

        return redirect('grupo');
    }

    public function edit($id)
    {
        //$grupoDatos = Grupo con el id
        $grupoDatos = Grupo::find($id);

        //$semestres = tabla semestres
        $semestres = Semestre::all();

        //$turnos = tabla turnos
        $turnos = Turno::all();

        //Manda los datos a la vista grupo.edit
        return view('grupo.edit')
            ->with('grupoDatos', $grupoDatos)
            ->with('semestres', $semestres)
            ->with('turnos', $turnos);
    }

    //Actualiza
    public function update(Request $request, $id)
    {
        //Valida los datos del $request 
        $validated = $request->validate([
            'grupo' => 'required|max:100|regex:/^.{1,100}$/', // el " . " es cualquier caracter menos nueva linea (enter)
            'turno_id' => 'required|numeric|regex:/^[1-9]{1}$/', // solo hay 3 turnos, se deja 6 de margen de error (alteración de tabla)
            'semestre_id' => 'required|numeric|regex:/^[0-9]{1,18}$/', //solo hay 12 semestres aprox, se deja 88 de margen de error (alteración de tabla)
        ]);

        $grupo = Grupo::find($id);
        $grupo->grupo = $request->grupo;
        $grupo->semestre_id = $request->semestre_id;
        $grupo->turno_id = $request->turno_id;
        $grupo->save();

        return redirect('grupo');
    }

    //Borra el grupo con el id que mandemos
    public function destroy($id)
    {
        Grupo::destroy($id);

        return redirect('grupo');
    }
}
