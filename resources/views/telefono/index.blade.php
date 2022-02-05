@extends('welcome')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>telefono</th>
            <th>estudiante_id</th>
            <th>acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($telefonos as $telefonoDatos)
        <tr>
            <td>{{$telefonoDatos->id}}</td>
            <td>{{$telefonoDatos->telefono}}</td>
            <td>{{$telefonoDatos->estudiante_id}}</td>
            <td>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-primary" href="{{ url('/telefono/'.$telefonoDatos->id.'/edit') }}">
                                Editar
                            </a>
                        </div>
                        <div class="col">
                            <form method="post" action="{{ url('/telefono/'.$telefonoDatos->id) }}">
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