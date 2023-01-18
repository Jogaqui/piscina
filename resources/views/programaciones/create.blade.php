@extends('layout.plantilla')

@section('titulo','REGISTRO DE PROGRAMACIONES')

@section('contenido')
<div class="grid grid-cols-12 gap-6 mt-5" >
    <div class="intro-y col-span-12 lg:col-span-6" class="p-5">
    <br>
    <h1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Nueva Programación de Clase</h1>
            <form method="POST" action="{{route('programaciones.store')}}">
                @csrf
                <div class="form-group">
                    <label class="control-label">PERIODO:</label>
                    <select class="form-control" name="idperiodo" id="idperiodo">
                        @foreach($PERIODO as $itemperiodo)
                            <option value="{{$itemperiodo['idperiodo']}}">
                                {{$itemperiodo['periodo']}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">DOCENTE:</label>
                        <select class="form-control" name="idpersonal" id="idpersonal">
                                <option selected >Elegir Opcion</option>
                                @foreach($PERSONAL as $itempersonal)
                                    @if ($itempersonal->idcargo==2)
                                        <option value="{{$itempersonal['idpersonal']}}">                                           
                                            {{$itempersonal['nombres']}}
                                            {{$itempersonal['apellidos']}}                               
                                        </option>
                                    @endif                    
                                @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label class="control-label">HORARIO:</label>
                    <select class="form-control" name="idhorario" id="idhorario">
                        <option selected disabled value="">Elegir Opcion</option>
                        @foreach($HORARIO as $itemhorario)
                            <option value="{{$itemhorario['idhorario']}}"> 
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
                <div class="form-group">
                    <label class="control-label">PISCINA:</label>
                    <select class="form-control" name="idpiscina" id="idpiscina">
                        <option selected >Elegir Opcion</option>
                        @foreach($PISCINA as $itempiscina)
                                <option value="{{$itempiscina['idpiscina']}}">                                           
                                    {{$itempiscina['descripcion']}}                              
                                </option>                 
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">NIVEL:</label>
                    <select class="form-control" name="idnivel" id="idnivel">
                        <option selected >Elegir Opcion</option>
                        @foreach($NIVEL as $itemnivel)
                                <option value="{{$itemnivel['idnivel']}}">                                           
                                    {{$itemnivel['descripcion']}}                              
                                </option>                 
                        @endforeach
                    </select>
                </div>  
                <div class="form-group">
                    <label class="control-label">VACANTE:</label> <br>
                    <input type="text" name="vacante" id="vacante">
                </div> 
                <br>     
                <button type="submit" class="btn btn-primary"><i class="fas fa-save">Grabar</i></button>
                <a href="{{route('cancelar11')}}" class="btn btn-danger"><i class="fas fa-ban">Cancelar</i></a>
            </form>
            </div> 
            </div> 
    
@endsection