@extends('layout.plantilla')
@section('titulo','Anular Matrícula')

@section('contenido')
<div class="card-body">
        <h2 class="intro-y text-lg font-medium mt-10">ANULAR MATRÍCULA</h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="hidden md:block mx-auto text-slate-500"></div>
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
                        <th class="text-center whitespace-nowrap">HORA</th>
                        <th class="text-center whitespace-nowrap">ALUMNO</th>
                        <th class="text-center whitespace-nowrap">DOCENTE</th>
                        <th class="text-center whitespace-nowrap">HORARIO</th>
                        <th class="text-center whitespace-nowrap">PISCINA</th>
                        <th class="text-center whitespace-nowrap">NIVEL</th>
                        <th class="text-center whitespace-nowrap">MOTIVO DEL DESCUENTO</th>
                        <th class="text-center whitespace-nowrap">DESCUENTO</th>
                        <th class="text-center whitespace-nowrap">MES</th>
                        <th class="text-center whitespace-nowrap">MONTO</th>
                        <th class="text-center whitespace-nowrap">MONTO TOTAL</th>
                        <th class="text-center whitespace-nowrap">FORMA DE PAGO</th>
                        <th class="text-center whitespace-nowrap">PERIODO</th>
                        <th class="text-center whitespace-nowrap">ACCION</th>
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
                                <td class="text-center">{{$itemmatricula->idmatricula}}</td>
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
                                <td class="text-center">{{$itemmatricula->MONTO->descripcion}}</td>
                                <td class="text-center">{{$itemmatricula->MONTO->montomes}}</td>
                                <td class="text-center">{{$itemmatricula->MONTO->montomes-$itemmatricula->DESCUENTO->montod}}</td>
                                <td class="text-center">{{$itemmatricula->PAGO->pago}}</td>
                                <td class="text-center">{{$itemmatricula->PERIODO->periodo}}</td>
                                <td  class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                       <a href="{{route('anular.confirmar',$itemmatricula->idmatricula)}}" class="btn btn-danger btn-sm"> <i class="fas fa-edit"></i>Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{$matricula->links()}}
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