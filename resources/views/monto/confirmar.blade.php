<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
@extends('layout.plantilla')
@section('titulo', 'Eliminar Monto')
@section('contenido')
    <div class="content">
        <strong style="font-size: 20px"> ¿Desea eliminar registro?</strong><br>
        <div class="form-group">
           <label class="control-label">CÓDIGO</label>
           <input type="text" class="form-control" placeholder="{{$monto->idmonto}}" disabled/>
        </div><br>
        <div class="form-group">
           <label class="control-label">Descripción:</label>
           <input type="text" class="form-control" placeholder="{{$monto->descripcion}}" disabled/>
        </div><br>
        <div class="form-group">
           <label class="control-label">Monto del Mes:</label>
           <input type="text" class="form-control" placeholder="{{$monto->montomes}}" disabled/>
        </div><br>
        <div class="form-group">
           <label class="control-label">Monto de Clase:</label>
           <input type="text" class="form-control" placeholder="{{$monto->montoclase}}" disabled/>
        </div><br>
        <div class="form-group">
           <label class="control-label">Fecha Inicio:</label>
           <input type="text" class="form-control" placeholder="{{$monto->fechainicio}}" disabled/>
        </div><br>
        <div class="form-group">
           <label class="control-label">Fecha Fin:</label>
           <input type="text" class="form-control" placeholder="{{$monto->fechafin}}" disabled/>
        </div><br>
        <form method="POST"  action="{{route('monto.destroy',$monto->idmonto)}}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa fa-check-square">SI</i></button>
            <a href="{{route('cancelar10')}}" class="btn btn-primary"><i class="fas fa-times-circle">NO</i></a>
        </form>
    </div>
@endsection