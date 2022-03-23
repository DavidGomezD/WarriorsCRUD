@extends('welcome')

@section('content')

<div class="container">
    <div class="row my-3">
        <h3>
            Nuevo semestre
        </h3>
    </div>
    
    <form action= "{{url('/semestre')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="mb-3">
            <label class="form-label"> {{'Semestre'}} 
            <input type="text" class="form-control" name="semestre" value="{{old('semestre')}}" required maxlength="20" pattern="^[A-Z]{1}[a-z]{4,10} Semestre$">
            </label>
            @error('semestre')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-success">Guardar</button>
</div>

@endsection