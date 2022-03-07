@extends('welcome')

@section('content')

<div class="row my-3">
    <div class="col-2">
        <h3>Grupos</h3>
    </div>
</div>

<div class="row mt-3 mb-1">
    <div class="col-2">
        <a type="button" class="btn btn-success" href="/grupo/create">Nuevo grupo</a>
    </div>
</div>

<table class="table table-sm table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Grupo</th>
            <th>Turno</th>
            <th>Semestre</th>
            <th>Estudiantes</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
    @foreach($grupos as $grupoDatos)
        <tr>
            <td>{{$grupoDatos->id}}</td>
            <td>{{$grupoDatos->grupo}}</td>
            <td>{{$grupoDatos->turno->turno}}</td>
            <td>{{$grupoDatos->semestre->semestre}}</td>
            <td>
                 <a class="btn btn-warning" href="{{ url('/inscripcion/'.$grupoDatos->id) }}">
                    Estudiantes
                </a>       
            </td>
            <td>
                    <a class="btn btn-primary" href="{{ url('/grupo/'.$grupoDatos->id.'/edit') }}">
                        Editar
                    </a>
            </td>
            <td>    
                <form method="post" action="{{ url('/grupo/'.$grupoDatos->id) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection