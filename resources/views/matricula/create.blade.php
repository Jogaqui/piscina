
@extends('layout.plantilla')
@section('titulo','Registrar Matrícula')
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

    <br><br>
        <H1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Registrar Nueva Matrícula</H1>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                
                
        <div class="alert hidden" role="alert"></div>
        <form method="POST" action="{{route('matricula.store')}}">
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
                    @foreach($PERIODO as $itemperiodo)
                        <option value="{{$itemperiodo['idperiodo']}}">
                            {{$itemperiodo['periodo']}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">ALUMNO:</label>
                <select class="form-control" name="idalumno" id="idalumno">
                    <option selected disabled value="0">Elegir</option>
                    @foreach($ALUMNO as $itemalumno)
                        <option value="{{$itemalumno['idalumno']}}">
                            {{$itemalumno['nombres']}}
                            {{$itemalumno['apellidos']}}
                        </option>
                    @endforeach
                </select>
            </div>
            <label class="control-label">PROGRAMACIÓN:</label>
            <div class="flex items-center border-b border-teal-500 py-2">
                <select class="form-control" name="idprogramacion" id="idprogramacion">
                    <option selected value="0">Elegir</option>
      
                    @foreach($PROGRAMACION as $itemprogramacion)
                    @foreach($PERIODO as $itemperiodo)
                     @if ($itemperiodo->estado==1 && $itemperiodo->idperiodo==$itemprogramacion->idperiodo)
                       @if ($itemprogramacion->vacante>0)
                            <option value="{{$itemprogramacion['idprogramacion']}}">
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
                                @endforeach  -
                                @foreach($PISCINA as $itempiscina)
                                    @if($itemprogramacion->idpiscina == $itempiscina->idpiscina)
                                        {{$itempiscina['descripcion']}} 
                                    @endif
                                @endforeach -
                                @foreach($NIVEL as $itemnivel)
                                    @if($itemprogramacion->idnivel == $itemnivel->idnivel)
                                        {{$itemnivel['descripcion']}} 
                                    @endif
                                @endforeach -
                               VACANTES: {{$itemprogramacion->vacante}}   
                            </option> 
                        @endif  
                        @endif    
                    @endforeach
                   
                    @endforeach
                </select>
                <button type="button" id="btnverificar" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#faf4f4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 3c-1.2 0-2.4.6-3 1.7A3.6 3.6 0 0 0 4.6 9c-1 .6-1.7 1.8-1.7 3s.7 2.4 1.7 3c-.3 1.2 0 2.5 1 3.4.8.8 2.1 1.2 3.3 1 .6 1 1.8 1.6 3 1.6s2.4-.6 3-1.7c1.2.3 2.5 0 3.4-1 .8-.8 1.2-2 1-3.3 1-.6 1.6-1.8 1.6-3s-.6-2.4-1.7-3c.3-1.2 0-2.5-1-3.4a3.7 3.7 0 0 0-3.3-1c-.6-1-1.8-1.6-3-1.6Z"></path>
                    <path d="m9 12 2 2 4-4"></path>
                    </svg>
                </button>
            </div>
            <div class="col">
                <input hidden type="text" class="form-control" name="vacante" id="vacante">
            </div>
            <div class="form-group">
                <label class="control-label">MOTIVO DEL DESCUENTO - DESCUENTO:</label>
                <select class="form-control" name="iddescuento" id="iddescuento">
                    <option selected disabled value="0">Elegir</option>
                    @foreach($DESCUENTO as $itemdescuento)
                    @foreach($PERIODO as $itemperiodo)
                    @if ($itemperiodo->estado==1 && $itemperiodo->idperiodo==$itemdescuento->idperiodo)
                        <option value="{{$itemdescuento['iddescuento']}}">
                            {{$itemdescuento['descripcion']}} -
                            {{$itemdescuento['montod']}}
                        </option>
                        @endif 
                        @endforeach  
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">MES - MONTO:</label>
                <select class="form-control" name="idmonto" id="idmonto">
                    <option selected disabled value="0">Elegir</option>
                    @foreach($MONTO as $itemmonto)
                    @foreach($PERIODO as $itemperiodo)
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
       
            
            {{-- <h2 id="result"></h2> --}}
            {{-- <div class="form-group">
                <label class="control-label">MONTO TOTAL:</label>
                <input class="form-control @error('montotal') is-invalid @enderror" type="text"  id="montotal" name="montotal" value=" {{$itemmonto['montomes']}}-{{$itemdescuento['montod']}}"/>
                    @error('montotal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror --}}

                   
                {{-- <input  class="form-control @error('montotal') is-invalid @enderror" type="text"  id="montotal" name="montotal"/>
                    @error('montotal')
                  
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror --}}
                    
     
            <div class="form-group">
                <label class="control-label">FORMA DE PAGO:</label>
                <select class="form-control" name="idpago" id="idpago">
                    <option selected disabled value="0">Elegir</option>
                    @foreach($PAGO as $item)
                        <option value="{{$item['idpago']}}">{{$item['pago']}}</option>
                    @endforeach
                </select>
            </div><br>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save">Guardar</i></button>
            <a href="{{route('cancelar7')}}" class="btn btn-danger"><i class="fas fa-ban">Cancelar</i></a>
        </form>
    </div>
    </div>
</div>

@endsection




<!-- <script>
        alert("HOLA");
    var total = 0;
    $(document).ready(function () {
        $('#idprogramacion').change(function () {
            mostrarProgramacion();
        });
        $('#verificar').click(function () {
            verificarVacantes();
        });
    });
    
    function mostrarMensajeError(mensaje) {
      $(".alert").css('display', 'block');
      $(".alert").removeClass("hidden");
      $(".alert").addClass("alert-danger");
      $(".alert").html("<button type='button' class='close' dataclose='alert'> ×</button>" + "<span><b>Error!</b> " + mensaje + ".</span>");
      $('.alert').delay(5000).hide(400);
    }

    function mostrarProgramacion(){
        alert("PROGRAMACION");

        idprogramacion = $("#idgramacion").val();

        $.get('/EncontrarProgramacion/' + idprogramacion, function(data){
            $('input[name=idprogramacion]').val(data[0].idprogramacion);
            $('input[name=vacante]').val(data[0].vacante);
        });

    }

    function verificarVacantes(){
        alert("BOTON VERIFICAR");
        let vacante = parseInt($("#vacante").val(),10);
        if (vacante == 0){
            mostrarMensajeError("Ya no hay vacantes, seleccione otra programación");
            return false;
        }
    }
</script> -->

