@extends('layout.plantilla')
@section('titulo','Eliminar Descuento')

@section('contenido')
        <br><br>
        <H1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">¿Desea eliminar registro?</H1>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="form-group">
                    <label class="control-label">CÓDIGO</label>
                    <input type="text" class="form-control" placeholder="{{$descuento->iddescuento}}" disabled/>
                </div><br>
                <div class="form-group">
                    <label class="control-label">MOTIVO DEL DESCUENTO</label>
                    <input type="text" class="form-control" placeholder="{{$descuento->descripcion}}" disabled/>
                </div><br>
                <div class="form-group">
                    <label class="control-label">DESCUENTO</label>
                    <input type="text" class="form-control" placeholder="{{$descuento->montod}}" disabled/>
                </div><br>
                <div class="form-group">
                    <label class="control-label">PERIODO</label>
                    <input type="text" class="form-control" placeholder="{{$descuento->periodo->periodo}}" disabled/>
                </div><br>
                <form method="POST" action="{{route('descuento.destroy',$descuento->iddescuento)}}">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger"> <i class="fas fa-check-square"></i> SI </button>
                    <a href="{{route('cancelar9')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO </a>
                </form>
            </div>
        </div>

@endsection
