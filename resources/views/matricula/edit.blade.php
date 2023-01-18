@extends('layout.plantilla')
@section('titulo','Actualizar datos de la Matrìcula')

@section('contenido')

    <div class="content">
        <h1>Modificar Matricula</h1>
        <form method="POST" action="{{route('matricula.update',$matricula->idmatricula)}}">
            @method('put')
            @csrf
            <div class="form-group">
                <label class="control-label">CÓDIGO</label>
                <input type="text" class="form-control" id="idmatricula" name="idmatricula" value="{{$matricula->idmatricula}}" disabled/>
            </div>

            <div>
                <label class="control-label">FECHA:</label>
                <input type="date" class="form-control" name="fecha" id="fechaActual" value="{{$matricula->fecha}}">
            </div>
            <div class="form-group">
                <label class="control-label">HORA:</label>
                <input type="time" class="form-control"   name="hora" id="horaActual" value="{{$matricula->hora}}" >
            
            </div>

            <div class="form-group">
                <label class="control-label">PERIODO:</label>
                <select class="form-control" name="idperiodo" id="idperiodo" >
                    <option selected disabled value="">Elegir Opcion</option>
                    @foreach($PERIODO as $itemperiodo)
                        <option value="{{$itemperiodo['idperiodo']}}" {{$itemperiodo->idperiodo == $matricula->idperiodo ? 'selected':''}}>
                            {{$itemperiodo['periodo']}}
                        </option>
                    @endforeach
                   
                </select>
            </div>

            <div class="form-group">
                <label class="control-label">ALUMNO:</label>
                <select class="form-control" name="idalumno" id="idalumno" >
                    @foreach($ALUMNO as $itemalumno)
                        <option value="{{$itemalumno['idalumno']}}" {{$itemalumno->idalumno == $matricula->idalumno ? 'selected':''}}>
                            {{$itemalumno['nombres']}}
                            {{$itemalumno['apellidos']}}
                        </option>
                    @endforeach
                   
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">PROGRAMACION:</label>
                <select class="form-control" name="idprogramacion" id="idprogramacion">
                    <option selected >Elegir</option>
                    @foreach($PROGRAMACION as $itemprogramacion)
                    @if ($itemprogramacion->vacante>0)
                        <option value="{{$itemprogramacion['idprogramacion']}}" {{$itemprogramacion->idprogramacion == $matricula->idprogramacion ? 'selected':''}}>
                            @foreach($PERSONAL as $itempersonal)
                                @if($itemprogramacion->idpersonal == $itempersonal->idpersonal)
                                    {{$itempersonal['nombres']}} 
                                    {{$itempersonal['apellidos']}} 
                                @endif
                            @endforeach  - 
                            @foreach($HORARIO as $itemhorario)
                                @if($itemprogramacion->idhorario == $itemhorario->idhorario)
                                    @foreach($DIA as $itemdia)
                                        @if($itemhorario->iddia == $itemdia->iddia) 
                                            {{$itemdia['descripcion']}} 
                                        @endif
                                    @endforeach 
                                    {{$itemhorario['descripcion']}} 
                                @endif
                            @endforeach - 
                            @foreach($PISCINA as $itempiscina)
                                @if($itemprogramacion->idpiscina == $itempiscina->idpiscina)
                                    {{$itempiscina['descripcion']}} 
                                @endif
                            @endforeach - 
                            @foreach($NIVEL as $itemnivel)
                                @if($itemprogramacion->idnivel == $itemnivel->idnivel)
                                    {{$itemnivel['descripcion']}} 
                                @endif
                            @endforeach 
                        </option> 
                        @endif        
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="control-label">MOTIVO DEL DESCUENTO - DESCUENTO:</label>
                <select class="form-control" name="iddescuento" id="iddescuento" >
                    @foreach($DESCUENTO as $itemdescuento)
                        <option value="{{$itemdescuento['iddescuento']}}" {{$itemdescuento->iddescuento == $matricula->iddescuento ? 'selected':''}}>
                            {{$itemdescuento['descripcion']}} -
                            {{$itemdescuento['montod']}}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label class="control-label">MES - MONTO:</label>
                <select class="form-control" name="idmonto" id="idmonto" >
                    @foreach($MONTO as $item)
                        <option value="{{$item['idmonto']}}" {{$item->idmonto == $matricula->idmonto ? 'selected':''}}>
                            {{$item['descripcion']}} - 
                            {{$item['montomes']}} 
                        </option>
                    @endforeach
                </select>
            </div>
           
            <div class="form-group">
                <label class="control-label">MONTO TOTAL:</label>
                <input class="form-control @error('montotal') is-invalid @enderror" type="text" name="montotal" id="montotal"  value ="{{$matricula->montotal}}" >
                    @error('montotal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">FORMA DE PAGO:</label>
                <select class="form-control" name="idpago" id="idpago" >
                    @foreach($PAGO as $item)
                        <option value="{{$item['idpago']}}" {{$item->idpago == $matricula->idpago ? 'selected':''}}>
                            {{$item['pago']}}
                        </option>
                    @endforeach
                </select>
            </div>
            <br>
            <button class="btn btn-primary"><i class="fas fa-save"></i> Actualizar </button>
            <a href="{{route('cancelar7')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
        </form>
        <br>
    </div>
@endsection
