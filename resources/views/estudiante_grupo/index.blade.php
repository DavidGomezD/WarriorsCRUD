@extends('welcome')
 
@section('content')

<div class="row my-3">
    <h3>Estudiantes del grupo {{$grupo->grupo}} {{$grupo->semestre->semestre}} {{$grupo->turno->turno}}</h3>
</div>

<div class="row mt-3 mb-1">
    <div class="col-2">
        <a type="button" class="btn btn-primary" href="{{ url('/estudiante_grupo/'.$grupo->id.'/edit') }}">
            Modificar grupo
        </a>
    </div>
</div>

<table class="table table-sm table-bordered table-hover">

    <thead>
        <tr>
            <th>Nombre</th> 
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
        </tr>
    </thead>

    <tbody>

    @foreach($grupo->estudiantes as $estudiante)
        <tr>
            <td>{{$estudiante->nombre}}</td>
            <td>{{$estudiante->apellido_paterno}}</td>
            <td>{{$estudiante->apellido_materno}}</td>
        </tr>
    @endforeach

    </tbody>

</table>

@endsection