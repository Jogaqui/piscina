@extends('layout.plantilla')
@section('titulo','Registrar un nuevo Personal')
@section('contenido')
    
<div class="grid grid-cols-12 gap-6 mt-5" >
    <div class="intro-y col-span-12 lg:col-span-6" class="p-5">
    <br>   
    <h1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Registrar Nuevo Personal</h1>
        <form method="POST" action="{{route('personal.store')}}">
            @csrf
            <br>
            <div class="form-group">
                <label class="control-label">DNI:</label>
                <input class="form-control @error('dni') is-invalid @enderror" type="text" placeholder="Ingrese dni" id="dni" name="dni"/>
                    @error('dni')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">NOMBRES:</label>
                <input class="form-control @error('nombres') is-invalid @enderror" type="text" placeholder="Ingrese los nombres" id="nombres" name="nombres"/>
                    @error('nombres')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">APELLIDOS:</label>
                <input class="form-control @error('apellidos') is-invalid @enderror" type="text" placeholder="Ingrese los apellidos" id="apellidos" name="apellidos"/>
                    @error('apellidos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">DIRECCION:</label>
                <input class="form-control @error('direccion') is-invalid @enderror" type="text" placeholder="Ingrese una dirección" id="direccion" name="direccion"/>
                    @error('direccion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">TELÉFONO:</label>
                <input class="form-control @error('telefono') is-invalid @enderror" type="text" placeholder="Ingrese un teléfono" id="telefono" name="telefono"/>
                    @error('telefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">CARGO:</label>
                <select class="form-control" name="idcargo" id="idcargo">
                    @foreach($CARGO as $itemcargo)
                        <option value="{{$itemcargo['idcargo']}}">{{$itemcargo['cargo']}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save">Guardar</i></button>
            <a href="{{route('cancelar2')}}" class="btn btn-danger"><i class="fas fa-ban">Cancelar</i></a>
        </form>
    </div>
</div>
    
@endsection