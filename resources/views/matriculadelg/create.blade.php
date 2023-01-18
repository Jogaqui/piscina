@extends('layout.plantilla')
@section('titulo','Registrar Matrícula Delegación')
<script>
  window.onload = function(){
    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth()+1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var anio = fecha.getFullYear(); //obteniendo año

    if(dia<10)
        dia='0'+dia; //agrega cero si el menor de 10
    if(mes<10)
        mes='0'+mes //agrega cero si el menor de 10
    document.getElementById('fechaActual').value=anio+"-"+mes+"-"+dia;

    var hora = new Date(); //Hora actual
    var hrs= hora.getHours(); //Obteniendo la hora
    var min = hora.getMinutes(); //Obteniendo los minutos
    var seg = hora.getSeconds(); // Obteniendo los segundos

    if(hrs<10)
        hrs='0'+hrs; //agrega cero si el menor de 10
    if(min<10)
        min='0'+min //agrega cero si el menor de 10
    if(seg<10)
        seg='0'+seg //agrega cero si el menor de 10 
       
       document.getElementById('horaActual').value=hrs+":"+min+":"+seg;
    
  }

</script>

@section('contenido')
    <div class="content">
        <h1>Registrar Nueva Matrícula de Delegación</h1>
        <form method="POST" action="{{route('matriculadelg.store')}}">
            @csrf
            <div class="form-group">
                <label class="control-label">FECHA:</label>
                <input type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" id="fechaActual" readonly onmousedown="return false;" required>
                    @error('fecha')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">HORA:</label>
                <input type="time" class="form-control @error('hora') is-invalid @enderror" name="hora" id="horaActual" readonly onmousedown="return false;" required>
                    @error('hora')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">PERIODO:</label>
                <select class="form-control" name="idperiodo" id="idperiodo">
                    @foreach($periodo as $itemperiodo)
                        <option value="{{$itemperiodo['idperiodo']}}">
                            {{$itemperiodo['periodo']}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">INSTITUCIÓN:</label>
                <select class="form-control" name="iddelegacion" id="iddelegacion">
                    <option selected disabled value="">Elegir</option>
                    @foreach($delegacion as $item)
                        <option value="{{$item['iddelegacion']}}">
                            {{$item['razonsocial']}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">TARIFA - MONTO TARIFA:</label>
                <select class="form-control" name="idmonto" id="idmonto">
                    <option selected disabled value="">Elegir</option>
                    @foreach($monto as $itemmonto)
                    @foreach($periodo as $itemperiodo)
                        @if ($itemperiodo->estado==1 && $itemperiodo->idperiodo==$itemmonto->idperiodo)
                        <option value="{{$itemmonto['idmonto']}}">
                            {{$itemmonto['descripcion']}} - 
                            {{$itemmonto['montomes']}} 
                        </option>
                        @endif   
                    @endforeach
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">CANTIDAD:</label>
                <input class="form-control @error('cantidad') is-invalid @enderror" type="text" placeholder="Ingrese una cantidad" id="cantidad" name="cantidad"/>
                    @error('cantidad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            
            <div class="form-group">
                <label class="control-label">Observacion:</label>
                <input class="form-control @error('observacion') is-invalid @enderror" type="text" placeholder="Ingrese alguna observacion" id="observacion" name="observacion"/>
                    @error('observacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>

            <br>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save">Guardar</i></button>
            <a href="{{route('cancelar13')}}" class="btn btn-danger"><i class="fas fa-ban">Cancelar</i></a>
        </form>
    </div>
@endsection