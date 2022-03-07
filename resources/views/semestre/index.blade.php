@extends('welcome')

@section('content')

<div class="row my-3">
    <div class="col-2">
        <h3>Semestres</h3>
    </div>
</div>

<div class="row my-3 mb-1">
    <div class="col-2">
        <a type="button" class="btn btn-success" href="/semestre/create">Nuevo semestre</a>
    </div>
</div>

<table class="table table-sm table-bordered table-hover">
    <thead>
        <tr>
            <th>Semestre</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
    @foreach($semestres as $semestreDatos)
        <tr>
            <td>{{$semestreDatos->semestre}}</td>
            <td>     
                <a class="btn btn-primary" href="{{ url('/semestre/'.$semestreDatos->id.'/edit') }}">
                    Editar
                </a>      
            </td>
            <td>
                <form method="post" action="{{ url('/semestre/'.$semestreDatos->id) }}">
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