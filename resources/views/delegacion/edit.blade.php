@extends('layout.plantilla')
@section('titulo','Actualizar datos de la Delegación')
@section('contenido')

        <br><br>
        <H1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Actualizar Registro</H1>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <form method="POST" action="{{route('delegacion.update',$delegacion->iddelegacion)}}" style="padding-left: 25px">
                    @method('put')
                    @csrf
                    <br>
                    <div class="form-group">
                        <label class="control-label">CÓDIGO</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{$delegacion->iddelegacion}}" disabled/>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">RUC:</label>
                        <input class="form-control @error('ruc') is-invalid @enderror" type="text"  id="ruc" name="ruc" value="{{$delegacion->ruc}}"/>
                            @error('ruc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">RAZÓN SOCIAL:</label>
                        <input class="form-control @error('razonsocial') is-invalid @enderror" type="text"  id="razonsocial" name="razonsocial" value="{{$delegacion->razonsocial}}"/>
                            @error('razonsocial')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">DIRECCION:</label>
                        <input class="form-control @error('direccion') is-invalid @enderror" type="text"  id="direccion" name="direccion" value="{{$delegacion->direccion}}"/>
                            @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label-bold">TIPO DE CLIENTE:</label>
                        <input class="form-control @error('tipocliente') is-invalid @enderror" type="text"  id="tipocliente" name="tipocliente" value="{{$delegacion->tipocliente}}"/>
                            @error('tipocliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <br>
                    <button class="btn btn-primary mr-2"> <i class="fas fa-save"></i> Actualizar </button>
                    <a href="{{route('cancelar12')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>
                </form>
            </div>
        </div>
@endsection