@extends('layout.plantilla')
@section('titulo','Agregar Piscina')

@section('contenido')
<div class="grid grid-cols-12 gap-6 mt-5" >
<div class="intro-y col-span-12 lg:col-span-6" class="p-5">
<br>  

<h1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Registrar Nueva Piscina</h1>

<form method="POST" action="{{route('piscina.store')}}">
    @csrf
    <div class="form-group">
        <label class="control-label">DESCRIPCIÓN:</label>
        <input class="form-control @error('descripcion') is-invalid @enderror" type="text"
                placeholder="Ingrese descripciòn" id="descripcion" name="descripcion"/>
            @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
    </div>

    <button class="btn btn-primary"> <i class="fas fa-save"></i> Grabar </button>
    <a href="{{route('cancelar4')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>

@endsection