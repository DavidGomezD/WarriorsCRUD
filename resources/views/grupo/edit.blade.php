@extends('welcome')

@section('content')

<div class="container">

    <div class="row my-3">
        <h3>Seccion para editar grupos</h3>
    </div>

    <form action=" {{ url('/grupo/' . $grupoDatos->id) }} " method="post" enctype="multipart/form-data">
    
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    

    <div class="col">
        <div class="mb-3">
            <label class="form-label">{{'Grupo'}}
                <input type="text" class="form-control" name="grupo" value="{{ $grupoDatos->grupo }}" required maxlength="100" pattern="^.{1,100}$">
            </label>
        </div> 
        <div class="mb-3">
            <div class="col-auto">
                <label class="form-label" for="turno_id">Turno</label>
                <select class="form-select" id="turno_id" name="turno_id">
                    <option value="{{ $grupoDatos->turno_id }}">{{$grupoDatos->turno->turno}}</option>
                    @foreach($turnos as $turno)
                    <option value="{{$turno->id}}">{{$turno->turno}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="col-auto">
                <label class="form-label" for="semestre_id">Semestre</label>
                <select class="form-select" id="semestre_id" name="semestre_id">
                    <option value="{{ $grupoDatos->semestre_id }}">{{$grupoDatos->semestre->semestre}}</option>
                    @foreach($semestres as $semestre)
                    <option value="{{$semestre->id}}">{{$semestre->semestre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
   
    </form>
</div>



@endsection