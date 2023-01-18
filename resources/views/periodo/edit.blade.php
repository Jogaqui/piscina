
@extends('layout.plantilla')
@section('titulo','Editar Periodo')

@section('contenido')
<h1>Actualizar Nivel</h1>
<form method="POST" action="{{route('nivel.update',$nivel->idnivel)}}">
    @method('put')
    @csrf
    <div class="form-group">
        <label >CODIGO:</label>
        <input class="form-control" type="text" id="id" name="id" value="{{$nivel->idnivel}}" disabled/>
    </div>
    <div class="form-group">
        <label >descripcion::</label>
        <input class="form-control @error('descripcion') is-invalid @enderror" type="text"
                placeholder="Ingrese descripcion" id="descripcion" name="descripcion" value="{{$nivel->descripcion}}"/>
            @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
    </div>

    <button class="btn btn-primary"> <i class="fas fa-save"></i> Actualizar </button>
    <a href="{{route('cancelar8')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>
</form>

@endsection