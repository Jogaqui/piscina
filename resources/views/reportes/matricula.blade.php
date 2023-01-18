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
                              
                                    <h1 class="invoice-id">REPORTE MATRICULAS  {{$S}}</h1>

                                    <div class="date">Fecha del reporte: {{$DateAndTime}}</div>
                                </div>
                            </div>
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
                                        @endforeach
                                        <br> <tfoot >
                                           
                                           
                                            <tr>
                                            
                                                <td colspan="11"> MONTO TOTAL DE MATRICULAS</td>
                                                <td>S/ {{$P}}</td>
                                            </tr>
                                        </tfoot>
                                </tbody>
                            </table>
                          
                        </main>
                        <footer>Reportes 2022 Sky Store</footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>

    
</body>

</html>