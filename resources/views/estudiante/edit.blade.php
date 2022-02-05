@extends('welcome')

@section('content')

Seccion para editar estudiantes

<form action=" {{ url('/estudiante/' . $estudianteDatos->id) }} " method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}
    <label for="nombre">{{'Nombre'}}</label>
    <input type="text" name="nombre" value="{{ $estudianteDatos->nombre }}">
    <br/>

    <label for="apellido_paterno">{{'Apellido Paterno'}}</label>
    <input type="text" name="apellido_paterno" value="{{ $estudianteDatos->apellido_paterno }}">
    <br/>

    <label for="apellido_materno">{{'Apellido Materno'}}</label>
    <input type="text" name="apellido_materno" value="{{ $estudianteDatos->apellido_materno }}">
    <br/>

    <input type="submit" value="Editar">
</form>

@endsection