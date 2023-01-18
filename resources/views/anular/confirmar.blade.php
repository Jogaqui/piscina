@extends('layout.plantilla')
@section('titulo','Eliminar Cargo')

@section('contenido')
    <br><br>
    <H1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">¿Desea eliminar registro?</H1>
    <br>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="form-group">
                <label class="control-label">CÓDIGO</label>
                <input type="text" class="form-control" placeholder="{{$matricula->idmatricula}}" disabled/>
            </div><br>
            <div class="form-group">
                <label class="control-label">FECHA</label>
                <input type="text" class="form-control" placeholder="{{$matricula->fecha}}" disabled/>
            </div><br>
            <div class="form-group">
                <label class="control-label">HORA:</label>
                <input type="text" class="form-control" placeholder="{{$matricula->hora}}" disabled/>
            </div><br>
            <div class="form-group">
                <label class="control-label">ALUMNO:</label>
                <input type="text" class="form-control" placeholder="{{$matricula->ALUMNO->nombres}} {{$matricula->ALUMNO->apellidos}}" disabled/>
            </div><br>
            <div class="form-group">
                <label class="control-label">DOCENTE:</label>
                <input type="text" class="form-control" placeholder="{{$matricula->PROGRAMACION->PERSONAL->nombres}} {{$matricula->PROGRAMACION->PERSONAL->apellidos}}" disabled/>
            </div><br>
            <div class="form-group">
                <label class="control-label">HORARIO:</label>
                <input type="text" class="form-control" placeholder="{{$matricula->PROGRAMACION->HORARIO->DIA->descripcion}} {{$matricula->PROGRAMACION->HORARIO->descripcion}}" disabled/>
            </div><br>
            <div class="form-group">
                <label class="control-label">PISCINA:</label>
                <input type="text" class="form-control" placeholder="{{$matricula->PROGRAMACION->PISCINA->descripcion}}" disabled/>
            </div><br>
            <div class="form-group">
                <label class="control-label">NIVEL:</label>
                <input type="text" class="form-control" placeholder="{{$matricula->PROGRAMACION->NIVEL->descripcion}}" disabled/>
            </div><br>
            <div class="form-group">
                <label class="control-label">MOTIVO DEL DESCUENTO:</label>
                <input type="text" class="form-control" placeholder="{{$matricula->DESCUENTO->descripcion}}" disabled/>
            </div><br>
            <div class="form-group">
                <label class="control-label">DESCUENTO:</label>
                <input type="text" class="form-control" placeholder="{{$matricula->DESCUENTO->montod}} " disabled/>
            </div><br>
            <div class="form-group">
                <label class="control-label">MES:</label>
                <input type="text" class="form-control" placeholder="{{$matricula->MONTO->descripcion}} " disabled/>
            </div><br>
            <div class="form-group">
                <label class="control-label">MONTO DEL MES:</label>
                <input type="text" class="form-control" placeholder="{{$matricula->MONTO->montomes}} " disabled/>
            </div><br>
            <div class="form-group">
                <label class="control-label">FORMA DE PAGO:</label>
                <input type="text" class="form-control" placeholder="{{$matricula->PAGO->pago}} " disabled/>
            </div><br>
            <div class="form-group">
                <label class="control-label">PERIODO:</label>
                <input type="text" class="form-control" placeholder="{{$matricula->PERIODO->periodo}} " disabled/>
            </div><br>
            

            <form method="POST" action="{{route('anular.destroy',$matricula->idmatricula)}}">
                @method('delete')
                @csrf
                <button class="btn btn-danger"> <i class="fas fa-check-square"></i> SI </button>
                <a href="{{route('cancelar14')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO </a>
            </form>
        </div>    
    </div>
@endsection