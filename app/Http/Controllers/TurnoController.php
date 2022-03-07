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
        $turnoNuevosDatos=request()->except(['_token', '_method']);
        Turno::where('id', '=', $id)->update($turnoNuevosDatos);

        return redirect('turno');
    }

    public function destroy($id)
    {
        Turno::destroy($id);

        return redirect('turno');
    }
}
