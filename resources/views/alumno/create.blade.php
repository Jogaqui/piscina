@extends('layout.plantilla')

@section('titulo','REGISTRO DE ALUMNOS')

@section('contenido')
        <br><br>
        <H1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Registrar Nuevo Alumno</H1>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <form method="POST" action="{{route('alumno.store')}}" style="padding-left: 25px"><br>
                    @csrf
                    <div class="form-group">
                        <label class="control-label">DNI:</label>
                        <input class="form-control @error('dni') is-invalid @enderror" type="text" placeholder="Ingrese Dni" id="dni" name="dni"/>
                            @error('dni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">NOMBRES:</label>
                        <input class="form-control @error('nombres') is-invalid @enderror" type="text" placeholder="Ingrese nombres" id="nombres" name="nombres"/>
                            @error('nombres')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">APELLIDOS:</label>
                        <input class="form-control @error('apellidos') is-invalid @enderror" type="text" placeholder="Ingrese descripcion" id="apellidos" name="apellidos"/>
                            @error('apellidos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">EDAD:</label>
                        <input class="form-control @error('edad') is-invalid @enderror" type="text" placeholder="Ingrese edad" id="edad" name="edad"/>
                            @error('edad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">DIRECCION:</label>
                        <input class="form-control @error('direccion') is-invalid @enderror" type="text" placeholder="Ingrese direccion" id="direccion" name="direccion"/>
                            @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">TELEFONO:</label>
                        <input class="form-control @error('telefono') is-invalid @enderror" type="text" placeholder="Ingrese telefono" id="telefono" name="telefono"/>
                            @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">SEXO:</label>
                        <input class="form-control @error('sexo') is-invalid @enderror" type="text" placeholder="Ingrese sexo" id="sexo" name="sexo"/>
                            @error('sexo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">TIPO:</label>
                        <input class="form-control @error('tipo') is-invalid @enderror" type="text" placeholder="Ingrese tipo" id="tipo" name="tipo"/>
                            @error('tipo')
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
                    <a href="{{route('cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>
                </form>
            </div>
        </div>

@endsection