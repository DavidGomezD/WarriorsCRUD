@extends('welcome')

@section('content')
Seccion para editar correos

<form action=" {{ url('/correo/' . $correoDatos->id) }} " method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}

    <label for="correo"> {{'correo'}}</label>
    <input type="email" name="correo" value="{{ $correoDatos->correo }}" required>
    
    <br/>
    <label for="estudiante_id"> {{'estudiante_id'}} </label>
    <input type="number" name="estudiante_id" value="{{ $correoDatos->estudiante_id }}" required>
    <br/> 

    <input type="submit" value="Editar">
</form>

@endsection