@extends('layout.plantilla')

@section('titulo','REGISTRO DELEGACIÓN')

@section('contenido')
<br><br>
<h1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Registrar Nuevo Cargo</h1>
<div class="grid grid-cols-12 gap-6 mt-5">
<div class="intro-y col-span-12 lg:col-span-6">
    <form method="POST" action="{{route('delegacion.store')}}" style="padding-left: 25px">
        @csrf
        <br>
        <div class="form-group">
            <label class="control-label">RUC:</label>
            <input class="form-control @error('ruc') is-invalid @enderror" type="text" placeholder="Ingrese RUC" id="ruc" name="ruc"/>
                @error('ruc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        <br>
        <div class="form-group">
            <label class="control-label">RAZÓN SOCIAL:</label>
            <input class="form-control @error('razonsocial') is-invalid @enderror" type="text" placeholder="Ingrese razón social" id="razonsocial" name="razonsocial"/>
                @error('razonsocial')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        <br>
        <div class="form-group">
            <label class="control-label">DIRECCIÓN:</label>
            <input class="form-control @error('direccion') is-invalid @enderror" type="text" placeholder="Ingrese direccion" id="direccion" name="direccion"/>
                @error('direccion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        <br>
        <div class="form-group">
            <label class="control-label">TIPO_CLIENTE:</label>
            <input class="form-control @error('tipocliente') is-invalid @enderror" type="text" placeholder="Ingrese tipocliente" id="tipocliente" name="tipocliente"/>
                @error('tipocliente')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        <br>
        <button class="btn btn-primary mr-2"> <i class="fas fa-save"></i> Guardar </button>
        <a href="{{route('cancelar12')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>
    </form>
</div>
</div>
@endsection