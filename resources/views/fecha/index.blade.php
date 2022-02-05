@extends('welcome')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>fecha_nacimiento</th>
            <th>estudiante_id</th>
            <th>acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($fechas as $fechaDatos)
        <tr>
            <td>{{$fechaDatos->id}}</td>
            <td>{{$fechaDatos->fecha_nacimiento}}</td>
            <td>{{$fechaDatos->estudiante_id}}</td>
            <td>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-primary" href="{{ url('/fecha/'.$fechaDatos->id.'/edit') }}">
                                Editar
                            </a>
                        </div>
                        <div class="col">
                            <form method="post" action="{{ url('/fecha/'.$fechaDatos->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Borrar?');">Borrar</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection