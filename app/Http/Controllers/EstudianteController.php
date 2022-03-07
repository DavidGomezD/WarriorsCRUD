<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;
use App\Fecha;
use App\Correo;
use App\Telefono;

class EstudianteController extends Controller
{
    public function index()
    {
        //$estudiantes = tabla estudiantes
        $estudiantes = Estudiante::all();

        return view('estudiante.index')
            ->with('estudiantes', $estudiantes);
    }

    public function create()
    {
        return view('estudiante.create');
    }

    public function store(Request $request)
    {
        $estudiante = new Estudiante;
        $estudiante->guardar($request);

        return redirect('estudiante');
    }

    public function edit($id)
    {
        $estudianteDatos = Estudiante::findOrFail($id);

        return view('estudiante.edit', compact('estudianteDatos'));
    }

    public function update(Request $request, $id)
    {
        $estudiante = new Estudiante;
        $estudiante->actualizar($request, $id);

        return redirect('estudiante');
    }

    public function destroy($id)
    {
        Estudiante::destroy($id);
    
        return redirect('estudiante');
    }

}
