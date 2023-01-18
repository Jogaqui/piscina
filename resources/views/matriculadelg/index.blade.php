@extends('layout.plantilla')
@section('titulo','Matrícula Delegación')

@section('contenido')
<div class="card-body">
        <h2 class="intro-y text-lg font-medium mt-10">REGISTRAR MATRÍCULA DELEGACIÓN</h2>
        <h3 class="intro-y text-lg font-medium mt-10" style=" text-align: center" >PERIODO ACTUAL <span style=" font-size: 20px" >
                @foreach ($periodo as $item)
                @if ($item->estado == 1)
                     {{$item->periodo}}
                @endif
              @endforeach
            </span>
            </h3> 
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <a href="{{route('matriculadelg.create')}}"> <button class="btn btn-primary shadow-md mr-2">NUEVA MATRÍCULA</button></a>
                <div class="dropdown">
                    <a href="{{route('descargarPDFD')}}"><button style="background: rgb(245, 221, 5)" href="" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                        <span>DESCARGAR REPORTE</span>
                      </button></a>
                    
                </div>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-120 relative text-slate-500">
                    <form class="d-flex" role="search"  method="GET">
                        <input name="buscarpor" type="text" class="form-control w-56" placeholder="Buscar por Código de Matrícula" value="{{$busqueda}}">
                    <button class="btn btn-primary shadow-md mr-2">Buscar</button> 
                    </form>  
                </div>
            </div>

            @if (session('datos'))
                <div id="mensaje">
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    {{session('datos')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </div>
           @endif
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">CÓDIGO</th>
                        <th class="whitespace-nowrap">FECHA</th>
                        <th class="text-center whitespace-nowrap">RAZON SOCIAL</th>
                        <th class="text-center whitespace-nowrap">TARIFA</th>
                        <th class="text-center whitespace-nowrap">MONTO TARIFA</th>
                        <th class="text-center whitespace-nowrap">CANTIDAD</th>
                        <th class="text-center whitespace-nowrap">MONTO TOTAL</th>
                        <th class="text-center whitespace-nowrap">OBSERVACIÓN</th>
                        <th class="text-center whitespace-nowrap">PERIODO</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($matricula)<=0)
                        <tr class="intro-x">
                            <td class="text-center">No hay registros</td>
                        </tr>
                    @else
                        @foreach($matricula as $itemmatricula)
                            <tr class="intro-x">
                                <td class="text-center">{{$itemmatricula->idmatriculadeleg}}</td>
                                <td class="text-center">{{$itemmatricula->fecha}}</td>
                                <td class="text-center">
                                    {{$itemmatricula->delegacion->razonsocial}}
                                </td>
                                <td class="text-center">{{$itemmatricula->monto->descripcion}}</td>
                                <td class="text-center">{{$itemmatricula->monto->montomes}}</td>
                                <td class="text-center">{{$itemmatricula->cantidad}}</td>
                                <td class="text-center">{{$itemmatricula->montototal}}</td>
                                <td class="text-center">{{$itemmatricula->observacion}}</td>
                                <td class="text-center">{{$itemmatricula->PERIODO->periodo}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
    
        </div>
    </div>
</div>
@endsection

@section('script')
  <script>
    setTimeout(function(){
      document.querySelector('#mensaje').remove();
    }, 2000);
  </script>
@endsection
