
@extends('layout.plantilla')
@section('titulo','Editar Cargo')

@section('contenido')
        <br><br>
        <H1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Actualizar Registro</H1>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <form method="POST" action="{{route('cargo.update',$cargo->idcargo)}}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label >CODIGO:</label>
                        <input class="form-control" type="text" id="id" name="id" value="{{$cargo->idcargo}}" disabled/>
                    </div><br>
                    <div class="form-group">
                        <label >CARGO:</label>
                        <input class="form-control @error('cargo') is-invalid @enderror" type="text"
                                placeholder="Ingrese cargo" id="cargo" name="cargo" value="{{$cargo->cargo}}"/>
                            @error('cargo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <button class="btn btn-primary"> <i class="fas fa-save"></i> Actualizar </button>
                    <a href="{{route('cancelar1')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>
                </form>
            </div>  
        </div>  

@endsection