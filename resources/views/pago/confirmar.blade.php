@extends('layout.plantilla')
@section('titulo','Eliminar Medio de Pago')

@section('contenido')
    <strong style="font-size: 20px"> ¿Desea eliminar registro?</strong><br>
    <div class="form-group">
        <label class="control-label">CÓDIGO</label>
        <input type="text" class="form-control" placeholder="{{$PAGO->idpago}}" disabled/>
    </div><br>
    <div class="form-group">
        <label class="control-label">MEDIO DE PAGO</label>
        <input type="text" class="form-control" placeholder="{{$PAGO->pago}}" disabled/>
    </div><br>
    <form method="POST" action="{{route('pago.destroy',$PAGO->idpago)}}">
        @method('delete')
        @csrf
        <button class="btn btn-danger"> <i class="fas fa-check-square"></i> SI </button>
        <a href="{{route('cancelar14')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO </a>
    </form>

@endsection