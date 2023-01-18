
@extends('layout.plantilla')
@section('titulo','Editar Descuento')

@section('contenido')
        <br><br>
        <H1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Actualizar Registro</H1>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <form method="POST" action="{{route('descuento.update',$descuento->iddescuento)}}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label >PERIODO: {{$descuento->periodo->periodo}}</label>
                    </div><br>
                    <div class="form-group">
                        <label >CÓDIGO:</label>
                        <input class="form-control" type="text" id="id" name="id" value="{{$descuento->iddescuento}}" disabled/>
                    </div><br>
                    <div class="form-group">
                        <label >DESCRIPCIÓN:</label>
                        <input class="form-control @error('descripcion') is-invalid @enderror" type="text"
                                placeholder="Ingrese descuento" id="descripcion" name="descripcion" value="{{$descuento->descripcion}}"/>
                            @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div><br>
                    <div class="form-group">
                        <label >MONTO:</label>
                        <input class="form-control @error('montod') is-invalid @enderror" type="text"
                                placeholder="Ingrese monto" id="montod" name="montod" value="{{$descuento->montod}}"/>
                            @error('montod')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div><br>
                    <button class="btn btn-primary"> <i class="fas fa-save"></i> Actualizar </button>
                    <a href="{{route('cancelar9')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>
                </form>
            </div>
        </div>

@endsection