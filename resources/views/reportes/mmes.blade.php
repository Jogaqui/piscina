<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>

@php
 $P=0;
 $S="";

$DateAndTime = date('m-d-Y', time());  
@endphp
    
</head>
<body>
    <div class="card">
        <div class="card-body">
            <div id="invoice">
      
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
    							<img src="dist/images/logo.jpg" width="100" alt="">
									
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="javascript:;">
									PISCINA POSEIDON
									</a>
                                    </h2><br>
                                    <div>455 Foggy Heights, AZ 85004, PERÚ</div>
                                    <div>942536059</div>
                                    <div>piscinaposeidon@gmail.com</div>
                                </div>
                            </div>
                        </header>

                        <main>
                            <div class="row contacts">
                                <div class="col invoice-details">
                                      
                                    @foreach ($matricula as $itemmatriculas)
                                        @if ($itemmatriculas->PERIODO->estado=="1")
                                        @php
                                            $S=$itemmatriculas->PERIODO->periodo
                                        @endphp
                                        @endif
                                    @endforeach
                              
                                    <h1 class="invoice-id">REPORTE MATRICULAS POR MES - {{$S}}</h1>

                                    <div class="date">Fecha del reporte: {{$DateAndTime}}</div>
                                </div>
                            </div>
                        
                            @php
                                 $d1 = "$S-00-31";
                                 $date1 = date(($d1));

                                 $d2 = "$S-01-29";
                                 $date2 = date($d2);

                            
                            @endphp
                            <h1>ENERO</h1>
                            <table class="table table-report -mt-2">
                                <thead>
                                    <tr>
                                        <th class="no">#</th>
                                        <th class="whitespace-nowrap"> FECHA </th>
                                        <th class="text-center whitespace-nowrap">HORA</th>
                                        <th class="text-center whitespace-nowrap">ALUMNO</th>
                                        <th class="text-center whitespace-nowrap">DOCENTE</th>
                                        <th class="text-center whitespace-nowrap">HORARIO</th>
                                        <th class="text-center whitespace-nowrap">PISCINA</th>
                                        <th class="text-center whitespace-nowrap">NIVEL</th>
                                        <th class="text-center whitespace-nowrap">MOTIVO DEL DESCUENTO</th>
                                        <th class="text-center whitespace-nowrap">DESCUENTO</th>
                                        <th class="text-center whitespace-nowrap">MONTO</th>
                                        <th class="text-center whitespace-nowrap">MONTO TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($matricula as $itemmatricula)
                                            @if ($itemmatricula->fecha>=$date1 && $itemmatricula->fecha<=$date2)
                                                   <tr class="intro-x">
                                                <td  class="no">{{$itemmatricula->idmatricula}}</td>
                                                <td class="text-center">{{$itemmatricula->fecha}}</td>
                                                <td class="text-center">{{$itemmatricula->hora}}</td>
                                                <td class="text-center">
                                                    {{$itemmatricula->ALUMNO->nombres}}
                                                    {{$itemmatricula->ALUMNO->apellidos}}
                                                </td>
                                                <td class="text-center">
                                                    {{$itemmatricula->PROGRAMACION->PERSONAL->nombres}}
                                                    {{$itemmatricula->PROGRAMACION->PERSONAL->apellidos}}
                                                </td>
                                                <td class="text-center">
                                                    {{$itemmatricula->PROGRAMACION->HORARIO->DIA->descripcion}}
                                                    {{$itemmatricula->PROGRAMACION->HORARIO->descripcion}}                                   
                                                </td>
                                                <td class="text-center">
                                                    {{$itemmatricula->PROGRAMACION->PISCINA->descripcion}}                      
                                                </td>
                                                <td class="text-center">
                                                    {{$itemmatricula->PROGRAMACION->NIVEL->descripcion}}                      
                                                </td>
                                                <td class="text-center">
                                                    {{$itemmatricula->DESCUENTO->descripcion}}
                                                </td>
                                                <td class="text-center">
                                                    {{$itemmatricula->DESCUENTO->montod}}
                                                </td>
                                                <td class="text-center">{{$itemmatricula->MONTO->montomes}}</td>
                                                <td class="total">S/ {{$T=$itemmatricula->MONTO->montomes-$itemmatricula->DESCUENTO->montod}}</td>
                                    
                                                @php
                                   
                                                $P=$T+$P;
                                                @endphp
                                            </tr> 
                                            @endif
                                        
                                        @endforeach
                                        <br> <tfoot >
                                            <tr>
                                                
                                                <td colspan="11"> MONTO TOTAL DE ENERO</td>
                                                <td>S/ {{$P}}</td>
                                            </tr>
                                        </tfoot>
                                </tbody>
                            </table>
                            @php
                             $P=0;
                                    $d3 = "$S-02-29";
                                   $date3 = date($d3);
                             @endphp

                            <h1>FEBRERO</h1>
                            <table class="table table-report -mt-2">
                                <thead>
                                    <tr>
                                        <th class="no">#</th>
                                        <th class="whitespace-nowrap">FECHA</th>
                                        <th class="text-center whitespace-nowrap">HORA</th>
                                        <th class="text-center whitespace-nowrap">ALUMNO</th>
                                        <th class="text-center whitespace-nowrap">DOCENTE</th>
                                        <th class="text-center whitespace-nowrap">HORARIO</th>
                                        <th class="text-center whitespace-nowrap">PISCINA</th>
                                        <th class="text-center whitespace-nowrap">NIVEL</th>
                                        <th class="text-center whitespace-nowrap">MOTIVO DEL DESCUENTO</th>
                                        <th class="text-center whitespace-nowrap">DESCUENTO</th>
                                        <th class="text-center whitespace-nowrap">MONTO</th>
                                        <th class="text-center whitespace-nowrap">MONTO TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($matricula as $itemmatricula)
                                        @if ($itemmatricula->fecha<=$date3 && $itemmatricula->fecha>=$date2)
                                            <tr class="intro-x">
                                                <td  class="no">{{$itemmatricula->idmatricula}}</td>
                                                <td class="text-center">{{$itemmatricula->fecha}}</td>
                                                <td class="text-center">{{$itemmatricula->hora}}</td>
                                                <td class="text-center">
                                                    {{$itemmatricula->ALUMNO->nombres}}
                                                    {{$itemmatricula->ALUMNO->apellidos}}
                                                </td>
                                                <td class="text-center">
                                                    {{$itemmatricula->PROGRAMACION->PERSONAL->nombres}}
                                                    {{$itemmatricula->PROGRAMACION->PERSONAL->apellidos}}
                                                </td>
                                                <td class="text-center">
                                                    {{$itemmatricula->PROGRAMACION->HORARIO->DIA->descripcion}}
                                                    {{$itemmatricula->PROGRAMACION->HORARIO->descripcion}}                                   
                                                </td>
                                                <td class="text-center">
                                                    {{$itemmatricula->PROGRAMACION->PISCINA->descripcion}}                      
                                                </td>
                                                <td class="text-center">
                                                    {{$itemmatricula->PROGRAMACION->NIVEL->descripcion}}                      
                                                </td>
                                                <td class="text-center">
                                                    {{$itemmatricula->DESCUENTO->descripcion}}
                                                </td>
                                                <td class="text-center">
                                                    {{$itemmatricula->DESCUENTO->montod}}
                                                </td>
                                                <td class="text-center">{{$itemmatricula->MONTO->montomes}}</td>
                                                <td class="total">S/ {{$T=$itemmatricula->MONTO->montomes-$itemmatricula->DESCUENTO->montod}}</td>
                                    
                                                @php
                                   
                                                $P=$T+$P;
                                                @endphp
                                            </tr>
                                            @endif
                                        @endforeach
                                        <br> <tfoot >
                                            <tr>
                                               
                                                <td colspan="11"> MONTO TOTAL DE FEBRERO</td>
                                                <td>S/ {{$P}}</td>
                                            </tr>
                                        </tfoot>
                                </tbody>
                            </table>


                     @php
                      $P=0;
                            $d4 = "$S-03-31";
                           $date4 = date($d4);
                        
                     @endphp

                    <h1>MARZO</h1>
                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="no">#</th>
                                <th class="whitespace-nowrap">FECHA</th>
                                <th class="text-center whitespace-nowrap">HORA</th>
                                <th class="text-center whitespace-nowrap">ALUMNO</th>
                                <th class="text-center whitespace-nowrap">DOCENTE</th>
                                <th class="text-center whitespace-nowrap">HORARIO</th>
                                <th class="text-center whitespace-nowrap">PISCINA</th>
                                <th class="text-center whitespace-nowrap">NIVEL</th>
                                <th class="text-center whitespace-nowrap">MOTIVO DEL DESCUENTO</th>
                                <th class="text-center whitespace-nowrap">DESCUENTO</th>
                                <th class="text-center whitespace-nowrap">MONTO</th>
                                <th class="text-center whitespace-nowrap">MONTO TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($matricula as $itemmatricula)
                                @if ($itemmatricula->fecha<=$date4 && $itemmatricula->fecha>=$date3)
                                    <tr class="intro-x">
                                        <td  class="no">{{$itemmatricula->idmatricula}}</td>
                                        <td class="text-center">{{$itemmatricula->fecha}}</td>
                                        <td class="text-center">{{$itemmatricula->hora}}</td>
                                        <td class="text-center">
                                            {{$itemmatricula->ALUMNO->nombres}}
                                            {{$itemmatricula->ALUMNO->apellidos}}
                                        </td>
                                        <td class="text-center">
                                            {{$itemmatricula->PROGRAMACION->PERSONAL->nombres}}
                                            {{$itemmatricula->PROGRAMACION->PERSONAL->apellidos}}
                                        </td>
                                        <td class="text-center">
                                            {{$itemmatricula->PROGRAMACION->HORARIO->DIA->descripcion}}
                                            {{$itemmatricula->PROGRAMACION->HORARIO->descripcion}}                                   
                                        </td>
                                        <td class="text-center">
                                            {{$itemmatricula->PROGRAMACION->PISCINA->descripcion}}                      
                                        </td>
                                        <td class="text-center">
                                            {{$itemmatricula->PROGRAMACION->NIVEL->descripcion}}                      
                                        </td>
                                        <td class="text-center">
                                            {{$itemmatricula->DESCUENTO->descripcion}}
                                        </td>
                                        <td class="text-center">
                                            {{$itemmatricula->DESCUENTO->montod}}
                                        </td>
                                        <td class="text-center">{{$itemmatricula->MONTO->montomes}}</td>
                                        <td class="total">S/ {{$T=$itemmatricula->MONTO->montomes-$itemmatricula->DESCUENTO->montod}}</td>
                            
                                        @php
                           
                                        $P=$T+$P;
                                        @endphp
                                    </tr>
                                    @endif
                                @endforeach
                                <br> <tfoot >
                                    <tr>
                                      
                                        <td colspan="11"> MONTO TOTAL DE MARZO</td>
                                        <td>S/ {{$P}}</td>
                                    </tr>
                                </tfoot>
                        </tbody>
                    </table>




                    @php
                    $P=0;
                          $d5 = "$S-04-30";
                         $date5 = date($d5);
                      
                   @endphp

                  <h1>ABRIL</h1>
                  <table class="table table-report -mt-2">
                      <thead>
                          <tr>
                              <th class="no">#</th>
                              <th class="whitespace-nowrap">FECHA</th>
                              <th class="text-center whitespace-nowrap">HORA</th>
                              <th class="text-center whitespace-nowrap">ALUMNO</th>
                              <th class="text-center whitespace-nowrap">DOCENTE</th>
                              <th class="text-center whitespace-nowrap">HORARIO</th>
                              <th class="text-center whitespace-nowrap">PISCINA</th>
                              <th class="text-center whitespace-nowrap">NIVEL</th>
                              <th class="text-center whitespace-nowrap">MOTIVO DEL DESCUENTO</th>
                              <th class="text-center whitespace-nowrap">DESCUENTO</th>
                              <th class="text-center whitespace-nowrap">MONTO</th>
                              <th class="text-center whitespace-nowrap">MONTO TOTAL</th>
                          </tr>
                      </thead>
                      <tbody>
                              @foreach($matricula as $itemmatricula)
                              @if ($itemmatricula->fecha<=$date5 && $itemmatricula->fecha>=$date4)
                                  <tr class="intro-x">
                                      <td  class="no">{{$itemmatricula->idmatricula}}</td>
                                      <td class="text-center">{{$itemmatricula->fecha}}</td>
                                      <td class="text-center">{{$itemmatricula->hora}}</td>
                                      <td class="text-center">
                                          {{$itemmatricula->ALUMNO->nombres}}
                                          {{$itemmatricula->ALUMNO->apellidos}}
                                      </td>
                                      <td class="text-center">
                                          {{$itemmatricula->PROGRAMACION->PERSONAL->nombres}}
                                          {{$itemmatricula->PROGRAMACION->PERSONAL->apellidos}}
                                      </td>
                                      <td class="text-center">
                                          {{$itemmatricula->PROGRAMACION->HORARIO->DIA->descripcion}}
                                          {{$itemmatricula->PROGRAMACION->HORARIO->descripcion}}                                   
                                      </td>
                                      <td class="text-center">
                                          {{$itemmatricula->PROGRAMACION->PISCINA->descripcion}}                      
                                      </td>
                                      <td class="text-center">
                                          {{$itemmatricula->PROGRAMACION->NIVEL->descripcion}}                      
                                      </td>
                                      <td class="text-center">
                                          {{$itemmatricula->DESCUENTO->descripcion}}
                                      </td>
                                      <td class="text-center">
                                          {{$itemmatricula->DESCUENTO->montod}}
                                      </td>
                                      <td class="text-center">{{$itemmatricula->MONTO->montomes}}</td>
                                      <td class="total">S/ {{$T=$itemmatricula->MONTO->montomes-$itemmatricula->DESCUENTO->montod}}</td>
                          
                                      @php
                         
                                      $P=$T+$P;
                                      @endphp
                                  </tr>
                                  @endif
                              @endforeach
                              <br> <tfoot >
                                <tr>
                                 
                                    <td colspan="11"> MONTO TOTAL DE ABRIL</td>
                                    <td>S/ {{$P}}</td>
                                </tr>
                              </tfoot>
                      </tbody>
                  </table>
                  @php
                  $P=0;
                        $d6 = "$S-05-31";
                       $date6 = date($d6);
                    
                 @endphp

                <h1>MAYO</h1>
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="no">#</th>
                            <th class="whitespace-nowrap">FECHA</th>
                            <th class="text-center whitespace-nowrap">HORA</th>
                            <th class="text-center whitespace-nowrap">ALUMNO</th>
                            <th class="text-center whitespace-nowrap">DOCENTE</th>
                            <th class="text-center whitespace-nowrap">HORARIO</th>
                            <th class="text-center whitespace-nowrap">PISCINA</th>
                            <th class="text-center whitespace-nowrap">NIVEL</th>
                            <th class="text-center whitespace-nowrap">MOTIVO DEL DESCUENTO</th>
                            <th class="text-center whitespace-nowrap">DESCUENTO</th>
                            <th class="text-center whitespace-nowrap">MONTO</th>
                            <th class="text-center whitespace-nowrap">MONTO TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($matricula as $itemmatricula)
                            @if ($itemmatricula->fecha<=$date6 && $itemmatricula->fecha>=$date5)
                                <tr class="intro-x">
                                    <td  class="no">{{$itemmatricula->idmatricula}}</td>
                                    <td class="text-center">{{$itemmatricula->fecha}}</td>
                                    <td class="text-center">{{$itemmatricula->hora}}</td>
                                    <td class="text-center">
                                        {{$itemmatricula->ALUMNO->nombres}}
                                        {{$itemmatricula->ALUMNO->apellidos}}
                                    </td>
                                    <td class="text-center">
                                        {{$itemmatricula->PROGRAMACION->PERSONAL->nombres}}
                                        {{$itemmatricula->PROGRAMACION->PERSONAL->apellidos}}
                                    </td>
                                    <td class="text-center">
                                        {{$itemmatricula->PROGRAMACION->HORARIO->DIA->descripcion}}
                                        {{$itemmatricula->PROGRAMACION->HORARIO->descripcion}}                                   
                                    </td>
                                    <td class="text-center">
                                        {{$itemmatricula->PROGRAMACION->PISCINA->descripcion}}                      
                                    </td>
                                    <td class="text-center">
                                        {{$itemmatricula->PROGRAMACION->NIVEL->descripcion}}                      
                                    </td>
                                    <td class="text-center">
                                        {{$itemmatricula->DESCUENTO->descripcion}}
                                    </td>
                                    <td class="text-center">
                                        {{$itemmatricula->DESCUENTO->montod}}
                                    </td>
                                    <td class="text-center">{{$itemmatricula->MONTO->montomes}}</td>
                                    <td class="total">S/ {{$T=$itemmatricula->MONTO->montomes-$itemmatricula->DESCUENTO->montod}}</td>
                        
                                    @php
                       
                                    $P=$T+$P;
                                    @endphp
                                </tr>
                                @endif
                            @endforeach
                            <br> <tfoot >
                                <tr>
                                    
                                    <td colspan="11"> MONTO TOTAL DE MAYO</td>
                                    <td>S/ {{$P}}</td>
                                </tr>
                            </tfoot>
                    </tbody>
                </table>
                @php
                $P=0;
                      $d7 = "$S-06-30";
                     $date7 = date($d7);
                  
               @endphp

              <h1>JUNIO</h1>
              <table class="table table-report -mt-2">
                  <thead>
                      <tr>
                          <th class="no">#</th>
                          <th class="whitespace-nowrap">FECHA</th>
                          <th class="text-center whitespace-nowrap">HORA</th>
                          <th class="text-center whitespace-nowrap">ALUMNO</th>
                          <th class="text-center whitespace-nowrap">DOCENTE</th>
                          <th class="text-center whitespace-nowrap">HORARIO</th>
                          <th class="text-center whitespace-nowrap">PISCINA</th>
                          <th class="text-center whitespace-nowrap">NIVEL</th>
                          <th class="text-center whitespace-nowrap">MOTIVO DEL DESCUENTO</th>
                          <th class="text-center whitespace-nowrap">DESCUENTO</th>
                          <th class="text-center whitespace-nowrap">MONTO</th>
                          <th class="text-center whitespace-nowrap">MONTO TOTAL</th>
                      </tr>
                  </thead>
                  <tbody>
                          @foreach($matricula as $itemmatricula)
                          @if ($itemmatricula->fecha<=$date7 && $itemmatricula->fecha>=$date6)
                              <tr class="intro-x">
                                  <td  class="no">{{$itemmatricula->idmatricula}}</td>
                                  <td class="text-center">{{$itemmatricula->fecha}}</td>
                                  <td class="text-center">{{$itemmatricula->hora}}</td>
                                  <td class="text-center">
                                      {{$itemmatricula->ALUMNO->nombres}}
                                      {{$itemmatricula->ALUMNO->apellidos}}
                                  </td>
                                  <td class="text-center">
                                      {{$itemmatricula->PROGRAMACION->PERSONAL->nombres}}
                                      {{$itemmatricula->PROGRAMACION->PERSONAL->apellidos}}
                                  </td>
                                  <td class="text-center">
                                      {{$itemmatricula->PROGRAMACION->HORARIO->DIA->descripcion}}
                                      {{$itemmatricula->PROGRAMACION->HORARIO->descripcion}}                                   
                                  </td>
                                  <td class="text-center">
                                      {{$itemmatricula->PROGRAMACION->PISCINA->descripcion}}                      
                                  </td>
                                  <td class="text-center">
                                      {{$itemmatricula->PROGRAMACION->NIVEL->descripcion}}                      
                                  </td>
                                  <td class="text-center">
                                      {{$itemmatricula->DESCUENTO->descripcion}}
                                  </td>
                                  <td class="text-center">
                                      {{$itemmatricula->DESCUENTO->montod}}
                                  </td>
                                  <td class="text-center">{{$itemmatricula->MONTO->montomes}}</td>
                                  <td class="total">S/ {{$T=$itemmatricula->MONTO->montomes-$itemmatricula->DESCUENTO->montod}}</td>
                      
                                  @php
                     
                                  $P=$T+$P;
                                  @endphp
                              </tr>
                              @endif
                          @endforeach
                          <br> <tfoot >
                            <tr>
                               
                                <td colspan="11"> MONTO TOTAL DE JUNIO</td>
                                <td>S/ {{$P}}</td>
                            </tr>
                          </tfoot>
                  </tbody>
              </table>
              @php
              $P=0;
                    $d8 = "$S-07-31";
                    $date8 = date($d8);
             @endphp

            <h1>JULIO</h1>
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="no">#</th>
                        <th class="whitespace-nowrap">FECHA</th>
                        <th class="text-center whitespace-nowrap">HORA</th>
                        <th class="text-center whitespace-nowrap">ALUMNO</th>
                        <th class="text-center whitespace-nowrap">DOCENTE</th>
                        <th class="text-center whitespace-nowrap">HORARIO</th>
                        <th class="text-center whitespace-nowrap">PISCINA</th>
                        <th class="text-center whitespace-nowrap">NIVEL</th>
                        <th class="text-center whitespace-nowrap">MOTIVO DEL DESCUENTO</th>
                        <th class="text-center whitespace-nowrap">DESCUENTO</th>
                        <th class="text-center whitespace-nowrap">MONTO</th>
                        <th class="text-center whitespace-nowrap">MONTO TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($matricula as $itemmatricula)
                        @if ($itemmatricula->fecha<=$date8 && $itemmatricula->fecha>=$date7)
                            <tr class="intro-x">
                                <td  class="no">{{$itemmatricula->idmatricula}}</td>
                                <td class="text-center">{{$itemmatricula->fecha}}</td>
                                <td class="text-center">{{$itemmatricula->hora}}</td>
                                <td class="text-center">
                                    {{$itemmatricula->ALUMNO->nombres}}
                                    {{$itemmatricula->ALUMNO->apellidos}}
                                </td>
                                <td class="text-center">
                                    {{$itemmatricula->PROGRAMACION->PERSONAL->nombres}}
                                    {{$itemmatricula->PROGRAMACION->PERSONAL->apellidos}}
                                </td>
                                <td class="text-center">
                                    {{$itemmatricula->PROGRAMACION->HORARIO->DIA->descripcion}}
                                    {{$itemmatricula->PROGRAMACION->HORARIO->descripcion}}                                   
                                </td>
                                <td class="text-center">
                                    {{$itemmatricula->PROGRAMACION->PISCINA->descripcion}}                      
                                </td>
                                <td class="text-center">
                                    {{$itemmatricula->PROGRAMACION->NIVEL->descripcion}}                      
                                </td>
                                <td class="text-center">
                                    {{$itemmatricula->DESCUENTO->descripcion}}
                                </td>
                                <td class="text-center">
                                    {{$itemmatricula->DESCUENTO->montod}}
                                </td>
                                <td class="text-center">{{$itemmatricula->MONTO->montomes}}</td>
                                <td class="total">S/ {{$T=$itemmatricula->MONTO->montomes-$itemmatricula->DESCUENTO->montod}}</td>
                    
                                @php
                   
                                $P=$T+$P;
                                @endphp
                            </tr>
                            @endif
                        @endforeach
                        <br> <tfoot >
                            <tr>
                               
                                <td colspan="11"> MONTO TOTAL DE JULIO</td>
                                <td>S/ {{$P}}</td>
                            </tr>
                        </tfoot>
                </tbody>
            </table>
            @php
            $P=0;
                  $d9 = "$S-08-31";
                 $date9 = date($d9);
              
           @endphp

          <h1>AGOSTO</h1>
          <table class="table table-report -mt-2">
              <thead>
                  <tr>
                      <th class="no">#</th>
                      <th class="whitespace-nowrap">FECHA</th>
                      <th class="text-center whitespace-nowrap">HORA</th>
                      <th class="text-center whitespace-nowrap">ALUMNO</th>
                      <th class="text-center whitespace-nowrap">DOCENTE</th>
                      <th class="text-center whitespace-nowrap">HORARIO</th>
                      <th class="text-center whitespace-nowrap">PISCINA</th>
                      <th class="text-center whitespace-nowrap">NIVEL</th>
                      <th class="text-center whitespace-nowrap">MOTIVO DEL DESCUENTO</th>
                      <th class="text-center whitespace-nowrap">DESCUENTO</th>
                      <th class="text-center whitespace-nowrap">MONTO</th>
                      <th class="text-center whitespace-nowrap">MONTO TOTAL</th>
                  </tr>
              </thead>
              <tbody>
                      @foreach($matricula as $itemmatricula)
                      @if ($itemmatricula->fecha<=$date9 && $itemmatricula->fecha>=$date8)
                          <tr class="intro-x">
                              <td  class="no">{{$itemmatricula->idmatricula}}</td>
                              <td class="text-center">{{$itemmatricula->fecha}}</td>
                              <td class="text-center">{{$itemmatricula->hora}}</td>
                              <td class="text-center">
                                  {{$itemmatricula->ALUMNO->nombres}}
                                  {{$itemmatricula->ALUMNO->apellidos}}
                              </td>
                              <td class="text-center">
                                  {{$itemmatricula->PROGRAMACION->PERSONAL->nombres}}
                                  {{$itemmatricula->PROGRAMACION->PERSONAL->apellidos}}
                              </td>
                              <td class="text-center">
                                  {{$itemmatricula->PROGRAMACION->HORARIO->DIA->descripcion}}
                                  {{$itemmatricula->PROGRAMACION->HORARIO->descripcion}}                                   
                              </td>
                              <td class="text-center">
                                  {{$itemmatricula->PROGRAMACION->PISCINA->descripcion}}                      
                              </td>
                              <td class="text-center">
                                  {{$itemmatricula->PROGRAMACION->NIVEL->descripcion}}                      
                              </td>
                              <td class="text-center">
                                  {{$itemmatricula->DESCUENTO->descripcion}}
                              </td>
                              <td class="text-center">
                                  {{$itemmatricula->DESCUENTO->montod}}
                              </td>
                              <td class="text-center">{{$itemmatricula->MONTO->montomes}}</td>
                              <td class="total">S/ {{$T=$itemmatricula->MONTO->montomes-$itemmatricula->DESCUENTO->montod}}</td>
                  
                              @php
                 
                              $P=$T+$P;
                              @endphp
                          </tr>
                          @endif
                      @endforeach
                      <br> <tfoot >
                        <tr>
                      
                            <td colspan="11"> MONTO TOTAL DE AGOSTO</td>
                            <td>S/ {{$P}}</td>
                        </tr>
                      </tfoot>
              </tbody>
          </table>
          @php
          $P=0;
                $d10 = "$S-09-30";
               $date10 = date($d10);
            
         @endphp

        <h1>SEPTIEMBRE</h1>
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="whitespace-nowrap">FECHA</th>
                    <th class="text-center whitespace-nowrap">HORA</th>
                    <th class="text-center whitespace-nowrap">ALUMNO</th>
                    <th class="text-center whitespace-nowrap">DOCENTE</th>
                    <th class="text-center whitespace-nowrap">HORARIO</th>
                    <th class="text-center whitespace-nowrap">PISCINA</th>
                    <th class="text-center whitespace-nowrap">NIVEL</th>
                    <th class="text-center whitespace-nowrap">MOTIVO DEL DESCUENTO</th>
                    <th class="text-center whitespace-nowrap">DESCUENTO</th>
                    <th class="text-center whitespace-nowrap">MONTO</th>
                    <th class="text-center whitespace-nowrap">MONTO TOTAL</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($matricula as $itemmatricula)
                    @if ($itemmatricula->fecha<=$date10 && $itemmatricula->fecha>=$date9)
                        <tr class="intro-x">
                            <td  class="no">{{$itemmatricula->idmatricula}}</td>
                            <td class="text-center">{{$itemmatricula->fecha}}</td>
                            <td class="text-center">{{$itemmatricula->hora}}</td>
                            <td class="text-center">
                                {{$itemmatricula->ALUMNO->nombres}}
                                {{$itemmatricula->ALUMNO->apellidos}}
                            </td>
                            <td class="text-center">
                                {{$itemmatricula->PROGRAMACION->PERSONAL->nombres}}
                                {{$itemmatricula->PROGRAMACION->PERSONAL->apellidos}}
                            </td>
                            <td class="text-center">
                                {{$itemmatricula->PROGRAMACION->HORARIO->DIA->descripcion}}
                                {{$itemmatricula->PROGRAMACION->HORARIO->descripcion}}                                   
                            </td>
                            <td class="text-center">
                                {{$itemmatricula->PROGRAMACION->PISCINA->descripcion}}                      
                            </td>
                            <td class="text-center">
                                {{$itemmatricula->PROGRAMACION->NIVEL->descripcion}}                      
                            </td>
                            <td class="text-center">
                                {{$itemmatricula->DESCUENTO->descripcion}}
                            </td>
                            <td class="text-center">
                                {{$itemmatricula->DESCUENTO->montod}}
                            </td>
                            <td class="text-center">{{$itemmatricula->MONTO->montomes}}</td>
                            <td class="total">S/ {{$T=$itemmatricula->MONTO->montomes-$itemmatricula->DESCUENTO->montod}}</td>
                
                            @php
               
                            $P=$T+$P;
                            @endphp
                        </tr>
                        @endif
                    @endforeach
                    <br> <tfoot >
                        <tr>
                            
                            <td colspan="11"> MONTO TOTAL DE SEPTIEMBRE</td>
                            <td>S/ {{$P}}</td>
                        </tr>
                    </tfoot>
            </tbody>
        </table>
        @php
        $P=0;
              $d11 = "$S-10-29";
             $date11 = date($d11);
          
       @endphp

      <h1>OCTUBRE</h1>
      <table class="table table-report -mt-2">
          <thead>
              <tr>
                  <th class="no">#</th>
                  <th class="whitespace-nowrap">FECHA</th>
                  <th class="text-center whitespace-nowrap">HORA</th>
                  <th class="text-center whitespace-nowrap">ALUMNO</th>
                  <th class="text-center whitespace-nowrap">DOCENTE</th>
                  <th class="text-center whitespace-nowrap">HORARIO</th>
                  <th class="text-center whitespace-nowrap">PISCINA</th>
                  <th class="text-center whitespace-nowrap">NIVEL</th>
                  <th class="text-center whitespace-nowrap">MOTIVO DEL DESCUENTO</th>
                  <th class="text-center whitespace-nowrap">DESCUENTO</th>
                  <th class="text-center whitespace-nowrap">MONTO</th>
                  <th class="text-center whitespace-nowrap">MONTO TOTAL</th>
              </tr>
          </thead>
          <tbody>
                  @foreach($matricula as $itemmatricula)
                  @if ($itemmatricula->fecha<=$date11 && $itemmatricula->fecha>=$date10)
                      <tr class="intro-x">
                          <td  class="no">{{$itemmatricula->idmatricula}}</td>
                          <td class="text-center">{{$itemmatricula->fecha}}</td>
                          <td class="text-center">{{$itemmatricula->hora}}</td>
                          <td class="text-center">
                              {{$itemmatricula->ALUMNO->nombres}}
                              {{$itemmatricula->ALUMNO->apellidos}}
                          </td>
                          <td class="text-center">
                              {{$itemmatricula->PROGRAMACION->PERSONAL->nombres}}
                              {{$itemmatricula->PROGRAMACION->PERSONAL->apellidos}}
                          </td>
                          <td class="text-center">
                              {{$itemmatricula->PROGRAMACION->HORARIO->DIA->descripcion}}
                              {{$itemmatricula->PROGRAMACION->HORARIO->descripcion}}                                   
                          </td>
                          <td class="text-center">
                              {{$itemmatricula->PROGRAMACION->PISCINA->descripcion}}                      
                          </td>
                          <td class="text-center">
                              {{$itemmatricula->PROGRAMACION->NIVEL->descripcion}}                      
                          </td>
                          <td class="text-center">
                              {{$itemmatricula->DESCUENTO->descripcion}}
                          </td>
                          <td class="text-center">
                              {{$itemmatricula->DESCUENTO->montod}}
                          </td>
                          <td class="text-center">{{$itemmatricula->MONTO->montomes}}</td>
                          <td class="total">S/ {{$T=$itemmatricula->MONTO->montomes-$itemmatricula->DESCUENTO->montod}}</td>
              
                          @php
             
                          $P=$T+$P;
                          @endphp
                      </tr>
                      @endif
                  @endforeach
                  <br> <tfoot >
                    <tr>
                      
                        <td colspan="11"> MONTO TOTAL DE OCTUBRE</td>
                        <td>S/ {{$P}}</td>
                    </tr>
                  </tfoot>
          </tbody>
      </table>
      @php
      $P=0;
            $d12 = "$S-11-29";
           $date12 = date($d12);
        
     @endphp

    <h1>NOVIEMBRE</h1>
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="no">#</th>
                <th class="whitespace-nowrap">FECHA</th>
                <th class="text-center whitespace-nowrap">HORA</th>
                <th class="text-center whitespace-nowrap">ALUMNO</th>
                <th class="text-center whitespace-nowrap">DOCENTE</th>
                <th class="text-center whitespace-nowrap">HORARIO</th>
                <th class="text-center whitespace-nowrap">PISCINA</th>
                <th class="text-center whitespace-nowrap">NIVEL</th>
                <th class="text-center whitespace-nowrap">MOTIVO DEL DESCUENTO</th>
                <th class="text-center whitespace-nowrap">DESCUENTO</th>
                <th class="text-center whitespace-nowrap">MONTO</th>
                <th class="text-center whitespace-nowrap">MONTO TOTAL</th>
            </tr>
        </thead>
        <tbody>
                @foreach($matricula as $itemmatricula)
                @if ($itemmatricula->fecha<=$date12 && $itemmatricula->fecha>=$date11)
                    <tr class="intro-x">
                        <td  class="no">{{$itemmatricula->idmatricula}}</td>
                        <td class="text-center">{{$itemmatricula->fecha}}</td>
                        <td class="text-center">{{$itemmatricula->hora}}</td>
                        <td class="text-center">
                            {{$itemmatricula->ALUMNO->nombres}}
                            {{$itemmatricula->ALUMNO->apellidos}}
                        </td>
                        <td class="text-center">
                            {{$itemmatricula->PROGRAMACION->PERSONAL->nombres}}
                            {{$itemmatricula->PROGRAMACION->PERSONAL->apellidos}}
                        </td>
                        <td class="text-center">
                            {{$itemmatricula->PROGRAMACION->HORARIO->DIA->descripcion}}
                            {{$itemmatricula->PROGRAMACION->HORARIO->descripcion}}                                   
                        </td>
                        <td class="text-center">
                            {{$itemmatricula->PROGRAMACION->PISCINA->descripcion}}                      
                        </td>
                        <td class="text-center">
                            {{$itemmatricula->PROGRAMACION->NIVEL->descripcion}}                      
                        </td>
                        <td class="text-center">
                            {{$itemmatricula->DESCUENTO->descripcion}}
                        </td>
                        <td class="text-center">
                            {{$itemmatricula->DESCUENTO->montod}}
                        </td>
                        <td class="text-center">{{$itemmatricula->MONTO->montomes}}</td>
                        <td class="total">S/ {{$T=$itemmatricula->MONTO->montomes-$itemmatricula->DESCUENTO->montod}}</td>
            
                        @php
           
                        $P=$T+$P;
                        @endphp
                    </tr>
                    @endif
                @endforeach
                <br> <tfoot >
                    <tr>
                      
                        <td colspan="11"> MONTO TOTAL DE NOVIEMBRE</td>
                        <td>S/ {{$P}}</td>
                    </tr>
                </tfoot>
        </tbody>
    </table>
    @php
    $P=0;
          $d13 = "$S-12-29";
         $date13 = date($d13);
      
   @endphp

  <h1>DICIEMBRE</h1>
  <table class="table table-report -mt-2">
      <thead>
          <tr>
              <th class="no">#</th>
              <th class="whitespace-nowrap">FECHA</th>
              <th class="text-center whitespace-nowrap">HORA</th>
              <th class="text-center whitespace-nowrap">ALUMNO</th>
              <th class="text-center whitespace-nowrap">DOCENTE</th>
              <th class="text-center whitespace-nowrap">HORARIO</th>
              <th class="text-center whitespace-nowrap">PISCINA</th>
              <th class="text-center whitespace-nowrap">NIVEL</th>
              <th class="text-center whitespace-nowrap">MOTIVO DEL DESCUENTO</th>
              <th class="text-center whitespace-nowrap">DESCUENTO</th>
              <th class="text-center whitespace-nowrap">MONTO</th>
              <th class="text-center whitespace-nowrap">MONTO TOTAL</th>
          </tr>
      </thead>
      <tbody>
              @foreach($matricula as $itemmatricula)
              @if ($itemmatricula->fecha<=$date13 && $itemmatricula->fecha>=$date12)
                  <tr class="intro-x">
                      <td  class="no">{{$itemmatricula->idmatricula}}</td>
                      <td class="text-center">{{$itemmatricula->fecha}}</td>
                      <td class="text-center">{{$itemmatricula->hora}}</td>
                      <td class="text-center">
                          {{$itemmatricula->ALUMNO->nombres}}
                          {{$itemmatricula->ALUMNO->apellidos}}
                      </td>
                      <td class="text-center">
                          {{$itemmatricula->PROGRAMACION->PERSONAL->nombres}}
                          {{$itemmatricula->PROGRAMACION->PERSONAL->apellidos}}
                      </td>
                      <td class="text-center">
                          {{$itemmatricula->PROGRAMACION->HORARIO->DIA->descripcion}}
                          {{$itemmatricula->PROGRAMACION->HORARIO->descripcion}}                                   
                      </td>
                      <td class="text-center">
                          {{$itemmatricula->PROGRAMACION->PISCINA->descripcion}}                      
                      </td>
                      <td class="text-center">
                          {{$itemmatricula->PROGRAMACION->NIVEL->descripcion}}                      
                      </td>
                      <td class="text-center">
                          {{$itemmatricula->DESCUENTO->descripcion}}
                      </td>
                      <td class="text-center">
                          {{$itemmatricula->DESCUENTO->montod}}
                      </td>
                      <td class="text-center">{{$itemmatricula->MONTO->montomes}}</td>
                      <td class="total">S/ {{$T=$itemmatricula->MONTO->montomes-$itemmatricula->DESCUENTO->montod}}</td>
          
                      @php
         
                      $P=$T+$P;
                      @endphp
                  </tr>
                  @endif
              @endforeach
              <br> <tfoot >
                <tr>
                  
                    <td colspan="11"> MONTO TOTAL DE DICIEMBRE</td>
                    <td>S/ {{$P}}</td>
                </tr>
              </tfoot>
      </tbody>
  </table>
                        </main>
                        <footer>Reportes  Piscina Poseidon</footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>

    
</body>

</html>