@extends('welcome')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>apellido_paterno</th>
            <th>apellido_materno</th>
            <th>acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($estudiantes as $estudianteDatos)
        <tr>
            <td>{{$estudianteDatos->id}}</td>
            <td>{{$estudianteDatos->nombre}}</td>
            <td>{{$estudianteDatos->apellido_paterno}}</td>
            <td>{{$estudianteDatos->apellido_materno}}</td>
            <td>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a type="button" class="btn btn-primary" href="{{ url('/estudiante/'.$estudianteDatos->id.'/edit') }}">
                            Editar
                            </a>
                        </div>
                        <div class="col">
                            <form method="post" action="{{ url('/estudiante/'.$estudianteDatos->id) }}">
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