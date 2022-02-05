@extends('welcome')

@section('content')
Seccion para edita fecha

<form action=" {{ url('/fecha/' . $fechaDatos->id) }} " method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}

    <label for="fecha_nacimiento"> {{'fecha_nacimiento'}}</label>
    <input type="date" name="fecha_nacimiento" value="{{ $fechaDatos->fecha_nacimiento }}" required>
    
    <br/>
    <label for="estudiante_id"> {{'estudiante_id'}} </label>
    <input type="number" name="estudiante_id" value="{{ $fechaDatos->estudiante_id }}" required>
    <br/> 

    <input type="submit" value="Editar">
</form>

@endsection