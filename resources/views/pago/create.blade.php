@extends('layout.plantilla')
@section('titulo','Agregar Medio de Pago')

@section('contenido')
<div class="grid grid-cols-12 gap-6 mt-5" >
<div class="intro-y col-span-12 lg:col-span-6" class="p-5">
<br>  
<h1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)"> Registrar Nuevo Medio de Pago </h1>
<form method="POST" action="{{route('pago.store')}}">
    @csrf
    <div class="form-group">
        <label >MEDIO DE PAGO:</label>
        <input class="form-control @error('pago') is-invalid @enderror" type="text"
                placeholder="Ingrese pago" id="pago" name="pago"/>
            @error('pago')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
    </div>
    <br>
    <button class="btn btn-primary"> <i class="fas fa-save"></i> Grabar </button>
    <a href="{{route('cancelar14')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>
@endsection