@extends('welcome')

@section('content')

<div class="container">
    <div class="row my-3">
        <h3>
            Nuevo estudiante
        </h3>
    </div>
    
    <form action= "{{url('/estudiante')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label"> {{'Nombre'}} 
                    <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}" required maxlength="50" pattern="^[A-ZÁÉÍÓÚ]{1}[a-záéíóú]{1,50}$">
                    @error('nombre')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label"> {{'Apellido Paterno'}} 
                    <input type="text" class="form-control" name="apellido_paterno" value="{{old('apellido_paterno')}}" required maxlength="50" pattern="^[A-ZÁÉÍÓÚ]{1}[a-záéíóú]{1,50}$">
                    @error('apellido_paterno')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label"> {{'Apellido Materno'}} 
                    <input type="text" class="form-control" name="apellido_materno" value="{{old('apellido_materno')}}" required maxlength="50" pattern="^[A-ZÁÉÍÓÚ]{1}[a-záéíóú]{1,50}$">
                    @error('apellido_materno')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                    </label>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label class="form-label"> {{'Fecha de Nacimiento'}} 
                        <input type="date" class="form-control" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" required>
                        @error('fecha_nacimiento')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label"> {{'Teléfono'}} 
                        <input type="number" class="form-control" name="telefono" value="{{old('telefono')}}" required>
                        @error('telefono')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label"> {{'Correo'}} 
                        <input type="email" class="form-control" name="correo" value="{{old('correo')}}" required maxlength="320" pattern="^[a-z0-9_.]{6,64}@[a-z0-9-.]{2,251}\.com$">
                        @error('correo')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </label>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-success">Guardar</button>
</div>

@endsection