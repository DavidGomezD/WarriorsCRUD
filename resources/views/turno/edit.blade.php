@extends('welcome')

@section('content')


<div class="container">
    <div class="row my-3">
        <h3>Seccion para editar turnos</h3>
    </div>
    <div class="col">
        <form action=" {{ url('/turno/' . $turnoDatos->id) }} " method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="mb-3">
            <label class="form-label">{{'Turno'}}
                <input type="text" class="form-control" name="turno" value="{{ $turnoDatos->turno }}" required maxlength="10">
            </label>
            @error('turno')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-success">Guardar</button> 
        </form>
    </div>
</div>



@endsection