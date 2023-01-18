@extends('layout.plantilla')
@section('titulo','Registrar un nuevo Horario')
@section('contenido')
   
        <div class="grid grid-cols-12 gap-6 mt-5" >
        <div class="intro-y col-span-12 lg:col-span-6" class="p-5">
        <br>   
        <h1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Registrar Nuevo Horario</h1>
        <form method="POST" action="{{route('horario.store')}}">
            @csrf
            <div class="form-group">
                <label class="control-label">DESCRIPCION:</label>
                <input class="form-control @error('descripcion') is-invalid @enderror" type="text" placeholder="Ingrese una descripción" id="descripcion" name="descripcion"/>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">DÍAS:</label>
                <select class="form-control" name="iddia" id="iddia">
                    @foreach($DIA as $itemdia)
                        <option value="{{$itemdia['iddia']}}">{{$itemdia['descripcion']}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save">Guardar</i></button>
            <a href="{{route('cancelar5')}}" class="btn btn-danger"><i class="fas fa-ban">Cancelar</i></a>
        </form>
    </div>
    </div>
@endsection