@extends('layout.plantilla')
@section('titulo','Agregar Descuento')

@section('contenido')
<br><br>
<h1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Registrar Nuevo Descuento</h1>
<div class="grid grid-cols-12 gap-6 mt-5">
<div class="intro-y col-span-12 lg:col-span-6">
<form method="POST" action="{{route('descuento.store')}}">
    @csrf
    <div class="form-group">
        <label class="control-label">PERIODO:</label>
        <select class="form-control" name="idperiodo" id="idperiodo">
            @foreach($periodo as $itemperiodo)
                <option value="{{$itemperiodo['idperiodo']}}">
                    {{$itemperiodo['periodo']}}
                </option>
            @endforeach
        </select>
    </div><br>
    <div class="form-group">
        <label >DESCUENTO:</label>
        <input class="form-control @error('descuento') is-invalid @enderror" type="text"
                placeholder="Ingrese descuento" id="descripcion" name="descripcion"/>
            @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
    </div><br>
    <div class="form-group">
        <label >MONTO:</label>
        <input class="form-control @error('montod') is-invalid @enderror" type="text"
                placeholder="Ingrese monto" id="montod" name="montod"/>
            @error('montod')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
    </div>
    <br>
    <button class="btn btn-primary"> <i class="fas fa-save"></i> Grabar </button>
    <a href="{{route('cancelar9')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>
</div>
</div>
@endsection