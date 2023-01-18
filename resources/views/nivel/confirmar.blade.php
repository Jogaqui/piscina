@extends('layout.plantilla')
@section('titulo','Eliminar nivel')

@section('contenido')
    <br><strong style="font-size: 20px"> ¿Desea eliminar registro?</strong><br>
    <br>
    <div class="form-group">
        <label class="control-label">CÓDIGO:</label>
        <input type="text" class="form-control" placeholder="{{$nivel->idnivel}}" disabled/>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label">DESCRIPCIÓN:</label>
        <input type="text" class="form-control" placeholder="{{$nivel->descripcion}}" disabled/>
    </div>
    <br>
    <form method="POST" action="{{route('nivel.destroy',$nivel->idnivel)}}">
        @method('delete')
        @csrf
        <button class="btn btn-danger mr-2"> <i class="fas fa-check-square"></i> Eliminar </button>
        <a href="{{route('cancelar3')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> Cancelar </a>
    </form>

@endsection
