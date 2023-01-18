
@extends('layout.plantilla')
@section('titulo','Editar nivel')

@section('contenido')
<br><strong style="font-size: 20px">Actualizar Nivel</strong><br>
<form method="POST" action="{{route('nivel.update',$nivel->idnivel)}}">
    @method('put')
    @csrf
    <br>
    <div class="form-group">
        <label >CODIGO:</label>
        <input class="form-control" type="text" id="id" name="id" value="{{$nivel->idnivel}}" disabled/>
    </div>
    <br>
    <div class="form-group">
        <label >DESCRIPCION::</label>
        <input class="form-control @error('descripcion') is-invalid @enderror" type="text"
                placeholder="Ingrese descripcion" id="descripcion" name="descripcion" value="{{$nivel->descripcion}}"/>
            @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
    </div>
    <br>
    <button class="btn btn-primary mr-2"> <i class="fas fa-save"></i> Actualizar </button>
    <a href="{{route('cancelar3')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>
</form>

@endsection