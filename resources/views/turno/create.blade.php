@extends('welcome')

@section('content')

<div class="container">
    <div class="row my-3">
        <h3>
            Nuevo turno
        </h3>
    </div>
    
    <form action= "{{url('/turno')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="mb-3">
            <label class="form-label"> {{'Turno'}} 
            <input type="text" class="form-control" name="turno" value="{{old('turno')}}" required maxlength="10">
            </label>
            @error('turno')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-success">Guardar</button>
</div>

@endsection