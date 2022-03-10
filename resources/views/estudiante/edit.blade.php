@extends('welcome')

@section('content')

<div class="container">

    <div class="row my-3">
        <h3>Seccion para editar estudiantes</h3>
    </div>

    <form action=" {{ url('/estudiante/' . $estudianteDatos->id) }} " method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">{{'Nombre'}}
                        <input type="text" class="form-control" name="nombre" value="{{ $estudianteDatos->nombre }}" required required maxlength="50">
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{'Apellido Paterno'}}
                        <input type="text" class="form-control" name="apellido_paterno" value="{{ $estudianteDatos->apellido_paterno }}" required required maxlength="50">
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{'Apellido Materno'}}
                        <input type="text" class="form-control" name="apellido_materno" value="{{ $estudianteDatos->apellido_materno }}" required required maxlength="50">
                    </label>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label class="form-label"> {{'Fecha de Nacimiento'}} 
                        <input type="date" class="form-control" name="fecha_nacimiento" value="{{ $estudianteDatos->fecha->fecha_nacimiento }}" required>
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label"> {{'Teléfono'}} 
                        <input type="number" class="form-control" name="telefono" value="{{ $estudianteDatos->telefono->telefono }}" required>
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label"> {{'Correo'}} 
                        <input type="email" class="form-control" name="correo" value="{{ $estudianteDatos->correo->correo }}" required required maxlength="320">
                    </label>
                    @error('correo')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>

</div>
@endsection