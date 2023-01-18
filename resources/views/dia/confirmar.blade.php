@extends('layout.plantilla')
@section('titulo','Eliminar Día')

@section('contenido')
        <br><br>
        <H1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">¿Desea eliminar registro?</H1>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="form-group">
                    <label class="control-label">CÓDIGO</label>
                    <input type="text" class="form-control" placeholder="{{$dia->iddia}}" disabled/>
                </div><br>
                <div class="form-group">
                    <label class="control-label">Descripción:</label>
                    <input type="text" class="form-control" placeholder="{{$dia->descripcion}}" disabled/>
                </div><br>
                <form method="POST" action="{{route('dia.destroy',$dia->iddia)}}">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger"> <i class="fas fa-check-square"></i> SI </button>
                    <a href="{{route('cancelar6')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO </a>
                </form>
            </div>
        </div>
@endsection
