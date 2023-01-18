@extends('layout.plantilla')
@section('titulo','Agregar Cargo')

@section('contenido')
<br><br>
<h1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Registrar Nuevo Cargo</h1>
<div class="grid grid-cols-12 gap-6 mt-5">
<div class="intro-y col-span-12 lg:col-span-6">
<form method="POST" action="{{route('cargo.store')}}">
    @csrf
    
    <div class="form-group">
        <label >CARGO:</label>
        <input class="form-control @error('cargo') is-invalid @enderror" type="text"
                placeholder="Ingrese cargo" id="cargo" name="cargo"/>
            @error('cargo')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
    </div>
    <br>
    <button class="btn btn-primary"> <i class="fas fa-save"></i> Grabar </button>
    <a href="{{route('cancelar1')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>
    </div>
    </div>

@endsection