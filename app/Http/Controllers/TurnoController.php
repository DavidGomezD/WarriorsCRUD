<?php

namespace App\Http\Controllers;

use App\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function index()
    {
        //$turnos = tabla turnos
        $turnos = Turno::all();

        return view('turno.index')
            ->with('turnos', $turnos);
    }

    public function create()
    {
        return view('turno.create');
    }

    public function store(Request $request)
    {
        //Valida los datos de $request
        $validated = $request->validate([
            'turno' => 'required|max:10|regex:/^[A-Z]{1}[a-z]{1,9}$/'
        ]);

        $turno = new Turno;
        $turno->guardar($request);

        return redirect('turno');
    }

    public function edit($id)
    {
        //$turnoDatos = turno con el id
        $turnoDatos = Turno::find($id);

        return view('turno.edit')
            ->with('turnoDatos', $turnoDatos);
    
    }

    public function update(Request $request, $id)
    {
        //Valida los datos de $request
        $validated = $request->validate([
            'turno' => 'required|max:10|regex:/^[A-Z]{1}[a-z]{1,9}$/'
        ]);
        
        $turno = Turno::find($id);
        $turno->turno = $request->turno;
        $turno->save();

        return redirect('turno');
    }

    public function destroy($id)
    {
        Turno::destroy($id);

        return redirect('turno');
    }
}
