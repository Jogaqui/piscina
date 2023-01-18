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
 $X="";  
$DateAndTime = date('m-d-Y', time());  
@endphp
    
</head>
<body>
    <div class="card">
        <div class="card-body">
            <div id="invoice">
      
                <div class="invoice overflow-auto">
                    @foreach ($matricula as $itemmatriculas)
                    @if ($itemmatriculas->PERIODO->estado=="1")
                    @php
                        $X=$itemmatriculas->PERIODO->periodo
                    @endphp
                    @endif
                    @endforeach
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
                                    <h1 class="invoice-id">REPORTE MATRICULAS DELEGACIONES {{$X}}</h1>
                                    <div class="date">Fecha del reporte: {{$DateAndTime}}</div>
                                </div>
                            </div>
                            <table class="table table-report -mt-2">
                                <thead>
                                    <tr>
                                        <th class="no">#</th>
                                        <th class="whitespace-nowrap">FECHA</th>
                                        <th class="text-center whitespace-nowrap">RAZON SOCIAL</th>
                                        <th class="text-center whitespace-nowrap">TARIFA</th>
                                        <th class="text-center whitespace-nowrap">MONTO TARIFA</th>
                                        <th class="text-center whitespace-nowrap">CANTIDAD</th>
                                 
                                        <th class="text-center whitespace-nowrap">OBSERVACIÓN</th>
                                        <th class="text-center whitespace-nowrap">PERIODO</th>
                                        <th class="total">MONTO TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                        @foreach($matricula as $itemmatricula)
                                            <tr class="intro-x">
                                                <td class="no">{{$itemmatricula->idmatriculadeleg}}</td>
                                                <td class="text-center">{{$itemmatricula->fecha}}</td>
                                                <td class="text-center">
                                                    {{$itemmatricula->delegacion->razonsocial}}
                                                </td>
                                                <td class="text-center">{{$itemmatricula->monto->descripcion}}</td>
                                                <td class="text-center">{{$itemmatricula->monto->montomes}}</td>
                                                <td class="text-center">{{$itemmatricula->cantidad}}</td>
                                         
                                                <td class="text-center">{{$itemmatricula->observacion}}</td>
                                                <td class="text-center">{{$itemmatricula->PERIODO->periodo}}</td>
                                                <td class="total">S/ {{$T=$itemmatricula->montototal}}</td>
                                                @php
                                   
                                                 $P=$T+$P;
                                                 @endphp
                                            
                                            </tr> 
                                        @endforeach
                                        <br> <tfoot >
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">SUBTOTAL</td>
                                                <td>S/ {{$P}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">IMPUESTO 25%</td>
                                                <td>S/ 30.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td> 
                                                <td colspan="2"> MONTO TOTAL DE MATRICULAS</td>
                                                <td>S/ {{$P-30}}</td>
                                            </tr>
                                        </tfoot>
                                 
                                </tbody>
                            </table>
                          
                        </main>
                        <footer> Reportes Piscina Poseidon</footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>

    
</body>

</html>