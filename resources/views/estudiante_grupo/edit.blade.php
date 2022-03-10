@extends('welcome')

@section('content')

<div class="row my-3">
    <div class="col">
        <h3>Modificar el grupo {{ $grupo->grupo }}</h3>
    </div>
</div>

<form action=" {{ url('/estudiante_grupo/'.$grupo->id) }} " method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="mb-3">
        <label class="form-label" for="modificacion">Selecciona la modificación</label>
        <select class="form-select" id="modificacion" name="modificacion">
            <option value="1">Inscribir estudiante</option>
            <option value="2">Dar de baja estudiante</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label" for="estudiante_id">Selecciona al estudiante</label>
        <select class="form-select" id="estudiante_id" name="estudiante_id">
            @foreach($estudiantes as $estudiante)
                <option value="{{$estudiante->id}}">
                    {{$estudiante->nombre.
                        ' '.
                        $estudiante->apellido_paterno.
                        ' '.
                        $estudiante->apellido_materno}}
                </option>
             @endforeach
        </select>
    </div>
        
    <button type="submit" class="btn btn-primary mt-1">Modificar</button> 

</form>

@endsection