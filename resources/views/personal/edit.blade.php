@extends('layout.plantilla')
@section('titulo','Actualizar datos del Personal')
@section('contenido')

<div class="grid grid-cols-12 gap-6 mt-5" >
    <div class="intro-y col-span-12 lg:col-span-6" class="p-5">
    <br>   
    <h1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Actualizar Personal</h1>

        <form method="POST" action="{{route('personal.update',$personal->idpersonal)}}">
            @method('put')
            @csrf
            <br>
            <div class="form-group">
                <label class="control-label">CÓDIGO</label>
                <input type="text" class="form-control" id="id" name="id" value="{{$personal->idpersonal}}" disabled/>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">DNI:</label>
                <input class="form-control @error('dni') is-invalid @enderror" type="text"  id="dni" name="dni" value="{{$personal->dni}}"/>
                    @error('dni')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">NOMBRES:</label>
                <input class="form-control @error('nombres') is-invalid @enderror" type="text"  id="nombres" name="nombres" value="{{$personal->nombres}}"/>
                    @error('nombres')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">APELLIDOS:</label>
                <input class="form-control @error('apellidos') is-invalid @enderror" type="text"  id="apellidos" name="apellidos" value="{{$personal->apellidos}}"/>
                    @error('apellidos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">DIRECCION:</label>
                <input class="form-control @error('direccion') is-invalid @enderror" type="text"  id="direccion" name="direccion" value="{{$personal->direccion}}"/>
                    @error('direccion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">TELÉFONO:</label>
                <input class="form-control @error('telefono') is-invalid @enderror" type="text"  id="telefono" name="telefono" value="{{$personal->telefono}}"/>
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
                    <option selected disabled value="">Elegir Opcion</option>
                    @foreach($CARGO as $item)
                        <option value="{{$item['idcargo']}}" {{$item->idcargo == $personal->idcargo ? 'selected':''}}>
                            {{$item['cargo']}}
                        </option>
                    @endforeach           
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save">Actualizar</i></button>
            <a href="{{route('cancelar2')}}" class="btn btn-danger"><i class="fas fa-ban">Cancelar</i></a>
        </form>
        <br>
    </div>
    </div>
@endsection