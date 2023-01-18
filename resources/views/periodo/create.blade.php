@extends('layout.plantilla')
@section('titulo','Agregar Periodo')

@section('contenido')
<form method="POST" action="{{route('periodo.store')}}">
    @csrf
    <div class="grid grid-cols-12 gap-6 mt-5" >
    <div class="intro-y col-span-12 lg:col-span-6" class="p-5">
    <br>   
<h1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Registrar Nuevo periodo</h1>
<label >PERIODO:</label> <br>
<input class="form-control @error('periodo') is-invalid @enderror" type="text"
        placeholder="Ingrese periodo" id="periodo" name="periodo"/>
    @error('periodo')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
    <br><button class="btn btn-primary"> <i class="fas fa-save"></i> Grabar </button>
    <a href="{{route('cancelar8')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>
  
@endsection