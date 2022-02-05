@extends('welcome')

@section('content')

<div class="container">
    <div class="row my-3">
        <h3>
            Nuevo teléfono

            <!--{{ $errors }}-->
        </h3>
    </div>

    <form action= "{{url('/telefono')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

        <div class="mb-3">
            <label class="form-label"> {{'telefono'}} 
                <input type="number" class="form-control" name="telefono" required>
            </label>
        </div>
        
        <div class="mb-3">
            <label class="form-label"> {{'estudiante_id'}} 
                <input type="number" class="form-control" name="estudiante_id" required>
            </label>
        </div>
   
        <input type="submit" class="btn btn-success" value="Agregar">
    </form>

</div>

@endsection