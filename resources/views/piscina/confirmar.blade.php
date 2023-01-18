@extends('layout.plantilla')
@section('titulo', 'Eliminar Piscina')
@section('contenido')
        <br>
        <strong style="font-size: 20px"> ¿Desea eliminar registro?</strong><br>
        <br>
        <div class="form-group">
            <label class="control-label">CÓDIGO:</label>
            <input type="text" class="form-control" placeholder="{{$piscina->idpiscina}}" disabled/>
        </div>
        <br>
        <div class="form-group">
            <label class="control-label">DESCRIPCIÓN:</label>
            <input type="text" class="form-control" placeholder="{{$piscina->descripcion}}" disabled/>
        </div><br>

        <form method="POST"  action="{{route('piscina.destroy',$piscina->idpiscina)}}">
            @method('delete')
            @csrf
            <button class="btn btn-danger mr-2"> <i class="fas fa-save"></i> Eliminar </button>
            <a href="{{route('cancelar4')}}" class="btn btn-primary"><i class="fas fa-ban"></i> Cancelar </a>
        </form>
@endsection