@extends('layout.plantilla')
@section('titulo','Editar Medio de Pago')

@section('contenido')
<h1>Actualizar Medio de Pago</h1>
<form method="POST" action="{{route('pago.update',$PAGO->idpago)}}">
    @method('put')
    @csrf
    <div class="form-group">
        <label >CODIGO:</label>
        <input class="form-control" type="text" id="id" name="id" value="{{$PAGO->idpago}}" disabled/>
    </div>
    <div class="form-group">
        <label >MEDIO DE PAGO:</label>
        <input class="form-control @error('pago') is-invalid @enderror" type="text"
                placeholder="Ingrese cargo" id="pago" name="pago" value="{{$PAGO->pago}}"/>
            @error('cargo')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
    </div>

    <button class="btn btn-primary"> <i class="fas fa-save"></i> Actualizar </button>
    <a href="{{route('cancelar14')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>
</form>

@endsection