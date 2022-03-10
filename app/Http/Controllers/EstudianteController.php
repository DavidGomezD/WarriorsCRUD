<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;

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
        //Valida 
        $validated = $request->validate([
            //Correo formulario unico: tabla correos, campo correo
            'correo' => 'required|unique:correos,correo|max:320',
        ]);

        $estudiante = new Estudiante;
        $estudiante->guardarDatosEstudiante($request);

        return redirect('estudiante');
    }

    public function edit($id)
    {
        $estudianteDatos = Estudiante::findOrFail($id);

        return view('estudiante.edit', compact('estudianteDatos'));
    }

    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);

        //Si el correo del formulario es diferente al correo del estudiante actual
        if($request->correo != $estudiante->correo->correo){
            
            //El correo si se actualizo 
            
            //Valida el nuevo correo
            $validated = $request->validate([
                //Correo formulario unico: tabla correos, campo correo
                'correo' => 'required|unique:correos,correo|max:320',
            ]);
            
        }

        $estudiante->actualizarDatosEstudiante($request);

        return redirect('estudiante');
    }

    public function destroy($id)
    {
        Estudiante::destroy($id);
    
        return redirect('estudiante');
    }

}
