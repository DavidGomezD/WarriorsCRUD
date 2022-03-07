@extends('welcome')

@section('content')



    <div class="row my-3">
        <div class="col-2">
            <h3>Estudiantes</h3>
        </div>
    </div>
    <div class="row mt-3 mb-1">
        <div class="col-2">
            <a type="button" class="btn btn-success" href="/estudiante/create">Nuevo estudiante</a>
        </div>
    </div>

<table class="table table-sm table-bordered table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Fecha de nacimiento</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Editar</th>
            <th>Borrar</th>   
        </tr>
    </thead>
    <tbody>

    @foreach($estudiantes as $estudianteDatos)
    
        <tr>
            <td>{{$estudianteDatos->nombre}}</td>
            <td>{{$estudianteDatos->apellido_paterno}}</td>
            <td>{{$estudianteDatos->apellido_materno}}</td>
            <td>{{$estudianteDatos->fecha->fecha_nacimiento}}</td>
            <td>{{$estudianteDatos->telefono->telefono}}</td>
            <td>{{$estudianteDatos->correo->correo}}</td>
            <td>
                <div class="col">
                    <a type="button" class="btn btn-primary" href="{{ url('/estudiante/'.$estudianteDatos->id.'/edit') }}">
                        Editar
                    </a>
                </div>
            </td>
            <td>
                <div class="col">
                    <form method="post" action="{{ url('/estudiante/'.$estudianteDatos->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Borrar?');">Borrar</button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>

@endsection