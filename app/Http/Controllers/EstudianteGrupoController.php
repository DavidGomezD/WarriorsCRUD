<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;
use App\Estudiante;

class EstudianteGrupoController extends Controller
{

    public function show($id)
    {
        $grupo = Grupo::find($id); 
        
        return view('estudiante_grupo.index')
            ->with('grupo', $grupo);
    }

    //Nos manda a la vista editar para seleccionar el estudiante para inscribirlo
    public function edit($id)
    {
        $grupo = Grupo::find($id);

        $estudiantes = Estudiante::all();

        //$accion = 'Inscribir';
        
        return view('estudiante_grupo.edit')
            ->with('grupo', $grupo)
            ->with('estudiantes', $estudiantes);
    }

    //Edita la tabla grupos añadiendo o eliminando un nuevo estudiante
    public function update(Request $request, $id)
    {
        //Valida los datos del $request 
        $validated = $request->validate([
            'estudiante_id' => 'required|numeric|regex:/^[0-9]+$/',
            'modificacion' => 'required|numeric|regex:/^[1-2]{1}$/',
        ]);

        $grupo = Grupo::find($id);

        if ($request->modificacion == "1") {
            $grupo->estudiantes()->attach($request->estudiante_id);
        } elseif ($request->modificacion == "2") {
            $grupo->estudiantes()->detach($request->estudiante_id);
        }

        return view('estudiante_grupo.index')
            ->with('grupo', $grupo);
    }

}