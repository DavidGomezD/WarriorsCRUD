@extends('welcome')

@section('content')

<div class="container">
    <div class="row my-3">
        <h3>
            Nuevo semestre
        </h3>
    <!--{{ $errors }}-->
    </div>
    
    <form action= "{{url('/semestre')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="mb-3">
            <label class="form-label"> {{'Semestre'}} 
            <input type="text" class="form-control" name="semestre" required maxlength="30">
            </label>
        </div>
        
        <button type="submit" class="btn btn-success">Guardar</button>
</div>

@endsection