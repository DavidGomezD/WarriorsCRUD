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
        //Valida los datos de $request
        $validated = $request->validate([
            'nombre' => 'required|max:50',
            'apellido_paterno' => 'required|max:50',
            'apellido_materno' => 'required|max:50',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|numeric',
            //Correo formulario unico: tabla correos, campo correo
            'correo' => 'required|unique:correos,correo|max:320|email',
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
            
            //El correo si se actualizo, ser revisa el campo unico
            
            //Valida los datos del $request
            $validated = $request->validate([
                'nombre' => 'required|max:50',
                'apellido_paterno' => 'required|max:50',
                'apellido_materno' => 'required|max:50',
                'fecha_nacimiento' => 'required|date',
                'telefono' => 'required|numeric',
                //Correo formulario unico: tabla correos, campo correo
                'correo' => 'required|unique:correos,correo|max:320|email',
            ]);

        }else{

            //El correo no se actualizo, no se revisa el campo unico.
            //Ya que el correo es el mismo que el anterior mandaria un error. 

            //Valida los datos del $request
            $validated = $request->validate([
                'nombre' => 'required|max:50',
                'apellido_paterno' => 'required|max:50',
                'apellido_materno' => 'required|max:50',
                'fecha_nacimiento' => 'required|date',
                'telefono' => 'required|numeric',
                //Correo formulario unico: tabla correos, campo correo
                'correo' => 'required|max:320|email',
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
