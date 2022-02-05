@extends('welcome')

@section('content')
Seccion para editar telefonos

<form action=" {{ url('/telefono/' . $telefonoDatos->id) }} " method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}

    <label for="telefono"> {{'telefono'}}</label>
    <input type="number" name="telefono" value="{{ $telefonoDatos->telefono }}" required>
    
    <br/>
    <label for="estudiante_id"> {{'estudiante_id'}} </label>
    <input type="number" name="estudiante_id" value="{{ $telefonoDatos->estudiante_id }}" required>
    <br/> 

    <input type="submit" value="Editar">
</form>

@endsection