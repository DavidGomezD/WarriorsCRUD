@extends('welcome')

@section('content')

<div class="container">
    <div class="row my-3">
        <h3>
            Nuevo estudiante
        </h3>
    <!--{{ $errors }}-->
    </div>
    
    <form action= "{{url('/estudiante')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label"> {{'Nombre'}} 
                    <input type="text" class="form-control" name="nombre" required>
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label"> {{'Apellido Paterno'}} 
                    <input type="text" class="form-control" name="apellido_paterno" required>
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label"> {{'Apellido Materno'}} 
                    <input type="text" class="form-control" name="apellido_materno" required>
                    </label>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label class="form-label"> {{'Fecha de Nacimiento'}} 
                        <input type="date" class="form-control" name="fecha_nacimiento" required>
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label"> {{'Teléfono'}} 
                        <input type="number" class="form-control" name="telefono" required>
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label"> {{'Correo'}} 
                        <input type="email" size="320" class="form-control" name="correo" required>
                    </label>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-success">Guardar</button>
</div>

@endsection