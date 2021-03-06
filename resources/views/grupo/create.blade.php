@extends('welcome')

@section('content')

<div class="container">
    <div class="row my-3">
        <h3>
            Nuevo grupo
        </h3>
    </div>
    
    <form action= "{{url('/grupo')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="mb-3">
            <label class="form-label"> {{'Grupo'}} 
            <input type="text" class="form-control" name="grupo" value="{{old('grupo')}}" required maxlength="100" pattern="^.{1,100}$">
            @error('grupo')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
            </label>
        </div>

        <div class="mb-3">
            <div class="col-auto">
                <label class="form-label" for="turno_id">Turno</label>
                <select class="form-select" id="turno_id" name="turno_id">
                    @foreach($turnos as $turno)
                    <option value="{{$turno->id}}">{{$turno->turno}}</option>
                    @endforeach
                </select>
                @error('turno_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <div class="col-auto">
                <label class="form-label" for="semestre_id">Semestre</label>
                <select class="form-select" id="semestre_id" name="semestre_id">
                    @foreach($semestres as $semestre)
                    <option value="{{$semestre->id}}">{{$semestre->semestre}}</option>
                    @endforeach
                </select>
                @error('semestre_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <button type="submit" class="btn btn-success">Guardar</button>
</div>

@endsection