@extends('welcome')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>correo</th>
            <th>estudiante_id</th>
            <th>acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($correos as $correoDatos)
        <tr>
            <td>{{$correoDatos->id}}</td>
            <td>{{$correoDatos->correo}}</td>
            <td>{{$correoDatos->estudiante_id}}</td>
            <td>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-primary" href="{{ url('/correo/'.$correoDatos->id.'/edit') }}">
                                Editar
                            </a>
                        </div>
                        <div class="col">
                            <form method="post" action="{{ url('/correo/'.$correoDatos->id) }}">
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