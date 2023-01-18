@extends('layout.plantilla')
@section('titulo','Agregar nivel')

@section('contenido')
<form method="POST" action="{{route('nivel.store')}}">
    @csrf
    <div class="grid grid-cols-12 gap-6 mt-5" >
    <div class="intro-y col-span-12 lg:col-span-6" class="p-5">
    <br>  
    <h1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)"> Registrar Nuevo nivel </h1>
    <br><label>DESCRIPCION:</label>
    <input class="form-control @error('descripcion') is-invalid @enderror" type="text"
        placeholder="Ingrese nivel" id="descripcion" name="descripcion"/>
        @error('descripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    <br>
    <br><button class="btn btn-primary mr-2"> <i class="fas fa-save"></i> Guardar </button>
    <a href="{{route('cancelar3')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>
  
@endsection