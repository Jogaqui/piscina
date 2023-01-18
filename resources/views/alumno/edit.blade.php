@extends('layout.plantilla')
@section('titulo','Actualizar datos del Alumno')
@section('contenido')
        <br><br>
        <H1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Actualizar Registro</H1>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <form method="POST" action="{{route('alumno.update',$alumno->idalumno)}}" style="padding-left: 25px">
                    @method('put')
                    @csrf
                    <br>
                    <div class="form-group">
                        <label class="control-label">CÓDIGO</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{$alumno->idalumno}}" disabled/>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">DNI:</label>
                        <input class="form-control @error('dni') is-invalid @enderror" type="text"  id="dni" name="dni" value="{{$alumno->dni}}"/>
                            @error('dni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">NOMBRES:</label>
                        <input class="form-control @error('nombres') is-invalid @enderror" type="text"  id="nombres" name="nombres" value="{{$alumno->nombres}}"/>
                            @error('nombres')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">APELLIDOS:</label>
                        <input class="form-control @error('apellidos') is-invalid @enderror" type="text"  id="apellidos" name="apellidos" value="{{$alumno->apellidos}}"/>
                            @error('apellidos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">EDAD:</label>
                        <input class="form-control @error('edad') is-invalid @enderror" type="text"  id="edad" name="edad" value="{{$alumno->edad}}"/>
                            @error('edad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">DIRECCION:</label>
                        <input class="form-control @error('direccion') is-invalid @enderror" type="text"  id="direccion" name="direccion" value="{{$alumno->direccion}}"/>
                            @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">TELÉFONO:</label>
                        <input class="form-control @error('telefono') is-invalid @enderror" type="text"  id="telefono" name="telefono" value="{{$alumno->telefono}}"/>
                            @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">SEXO:</label>
                        <input class="form-control @error('sexo') is-invalid @enderror" type="text"  id="sexo" name="sexo" value="{{$alumno->sexo}}"/>
                            @error('sexo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">TIPO:</label>
                        <input class="form-control @error('tipo') is-invalid @enderror" type="text"  id="tipo" name="tipo" value="{{$alumno->tipo}}"/>
                            @error('tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label-bold">TIPO DE CLIENTE:</label>
                        <input class="form-control @error('tipocliente') is-invalid @enderror" type="text"  id="tipocliente" name="tipocliente" value="{{$alumno->tipocliente}}"/>
                            @error('tipocliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <button class="btn btn-primary mr-2"> <i class="fas fa-save"></i> Actualizar </button>
                    <a href="{{route('cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>

                </form>
            </div>
        </div>
@endsection