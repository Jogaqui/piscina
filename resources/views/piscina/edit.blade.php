@extends('layout.plantilla')
@section('titulo','Editar Piscina')

@section('contenido')
<br><strong style="font-size: 20px">Actualizar Piscina</strong><br>
<form method="POST" action="{{route('piscina.update',$piscina->idpiscina)}}">
    @method('put')
    @csrf
    <br>
    <div class="form-group">
        <label >CÒDIGO:</label>
        <input class="form-control" type="text" id="id" name="id" value="{{$piscina->idpiscina}}" disabled/>
    </div>
    <br>
    <div class="form-group">
        <label >DESCRIPCIÓN</label>
        <input class="form-control @error('descripcion') is-invalid @enderror" type="text"
                placeholder="Ingrese Descripcion" id="descripcion" name="descripcion" value="{{$piscina->descripcion}}"/>
            @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
    </div>
    <br>
    <button class="btn btn-primary"> <i class="fas fa-save"></i> Actualizar </button>
    <a href="{{route('cancelar4')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>
</form>

@endsection