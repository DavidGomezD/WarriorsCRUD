@extends('welcome')

@section('content')

<div class="container">
    <div class="row my-3">
        <h3>Seccion para editar semestres</h3>
    </div>

    <div class="col">
        <form action=" {{ url('/semestre/' . $semestreDatos->id) }} " method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="mb-3">
            <label class="form-label">{{'Semestre'}}
                <input type="text" class="form-control" name="semestre" value="{{ $semestreDatos->semestre }}" required maxlength="20">
            </label>
            @error('semestre')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-success">Guardar</button> 
    </form>
    </div>
</div>


@endsection