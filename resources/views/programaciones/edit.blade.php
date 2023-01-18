@extends('layout.plantilla')
@section('titulo','Modificar Registro de Clase')
@section('contenido')
        <br><strong style="font-size: 20px">Modificar Registro de Clase</strong><br>
        <form method="POST" action="{{route('programaciones.update',$programaciones->idprogramacion)}}">
            @method('put')
            @csrf
            <br>
            <div class="form-group">
                <label class="control-label">CÓDIGO:</label>
                <input type="text" class="form-control" id="idprogramacion" name="idprogramacion" value="{{$programaciones->idprogramacion}}" disabled/>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">PERIODO:</label>
                <select class="form-control" name="idperiodo" id="idperiodo">
                    <option selected disabled value="">Elegir Opcion</option>
                    @foreach($PERIODO as $itemperiodo)
                        <option value="{{$itemperiodo['idperiodo']}}" {{$itemperiodo->idperiodo == $programaciones->idperiodo ? 'selected':''}}>
                            {{$itemperiodo['periodo']}}
                        </option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">DOCENTE:</label>
                <select class="form-control" name="idpersonal" id="idpersonal">
                    <option selected disabled value="">Elegir Opcion</option>
                    @foreach($PERSONAL as $itempersonal)
                        @if ($itempersonal->idcargo=="2")
                        <option value="{{$itempersonal['idpersonal']}}" {{$itempersonal->idpersonal == $programaciones->idpersonal ? 'selected':''}}>
                            {{$itempersonal['nombres']}}
                            {{$itempersonal['apellidos']}}  
                        </option>
                        @endif
                    @endforeach           
                </select>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">HORARIO:</label>
                <select class="form-control" name="idhorario" id="idhorario">
                    <option selected disabled value="">Elegir Opcion</option>
                    @foreach($HORARIO as $itemhorario)
                        <option value="{{$itemhorario['idhorario']}}" {{$itemhorario->idhorario == $programaciones->idhorario ? 'selected':''}}>
                                @foreach($DIA as $itemdia)
                                        @if($itemhorario->iddia == $itemdia->iddia) 
                                            {{$itemdia['descripcion']}} 
                                        @endif
                                @endforeach                                                                              
                                {{$itemhorario['descripcion']}}  
                        </option>
                    @endforeach           
                </select>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">PISCINA:</label>
                <select class="form-control" name="idpiscina" id="idpiscina">
                    <option selected disabled value="">Elegir Opcion</option>
                    @foreach($PISCINA as $itempiscina)
                        <option value="{{$itempiscina['idpiscina']}}" {{$itempiscina->idpiscina == $programaciones->idpiscina ? 'selected':''}}>
                            {{$itempiscina['descripcion']}}
                        </option>
                    @endforeach           
                </select>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">NIVEL:</label>
                <select class="form-control" name="idnivel" id="idnivel">
                    <option selected disabled value="">Elegir Opcion</option>
                    @foreach($NIVEL as $itemnivel)
                        <option value="{{$itemnivel['idnivel']}}" {{$itemnivel->idnivel == $programaciones->idnivel ? 'selected':''}}>
                            {{$itemnivel['descripcion']}}
                        </option>
                    @endforeach           
                </select>
            </div>

            <div class="form-group">
                <label class="control-label">VACANTE:</label>
                <input class="form-control " type="text"  id="vacante" name="vacante" value="{{$programaciones->vacante}}"/>
                  
            </div> 
            <br>
            <button class="btn btn-primary mr-2"> <i class="fas fa-save"></i> Actualizar </button>
            <a href="{{route('cancelar11')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar </a>

        </form>
        <br>
@endsection