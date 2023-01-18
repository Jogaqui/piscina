@extends('layout.plantilla')
@section('titulo','Monto')

@section('contenido')
<div class="card-body">
        <h2 class="intro-y text-lg font-medium mt-10">REGISTRAR MONTO</h2>
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
                <a href="{{route('monto.create')}}"> <button class="btn btn-primary shadow-md mr-2">Agregar Monto</button></a>
                <div class="dropdown">
                    <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                    </button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            <li>
                                <a href="" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                            </li>
                        </ul>
                    </div>
                </div>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-120 relative text-slate-500">
                    <form class="d-flex" role="search"  method="GET">
                        <input name="buscarpor" type="text" class="form-control w-56" placeholder="Buscar por MES" value="{{$busqueda}}">
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
                        <th class="text-center whitespace-nowrap">CÓDIGO</th>
                        <th class="text-center whitespace-nowrap">DESCRIPCIÓN</th>
                        <th class="text-center whitespace-nowrap">MONTO MES</th>
                        <th class="text-center whitespace-nowrap">MONTO CLASE</th>
                        <th class="text-center whitespace-nowrap">FECHA INICIO </th>
                        <th class="text-center whitespace-nowrap">FECHA FIN</th>
                        <th class="text-center whitespace-nowrap">TIPO</th>
                        <th class="text-center whitespace-nowrap">PERIODO</th>
                        <th class="text-center whitespace-nowrap">OPCCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($monto)<=0)
                        <tr class="intro-x">
                            <td class="text-center">No hay registros</td>
                        </tr>
                    @else
                        @foreach($monto as $itemmonto)
                            <tr class="intro-x">
                                <td class="text-center">{{$itemmonto->idmonto}}</td>
                                <td class="text-center">{{$itemmonto->descripcion}}</td>
                                <td class="text-center">{{$itemmonto->montomes}}</td>
                                <td class="text-center">{{$itemmonto->montoclase}}</td>
                                <td class="text-center">{{$itemmonto->fechainicio}}</td>
                                <td class="text-center">{{$itemmonto->fechafin}}</td>
                                <td class="text-center">{{$itemmonto->tipo}}</td>
                                <td class="text-center">{{$itemmonto->PERIODO->periodo}}</td>
                                <td  class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                    <a href="{{route('monto.edit',$itemmonto->idmonto)}}" class="btn btn-info btn-sm"> <i class="fas fa-edit"></i>Editar</a>
                                    <a href="{{route('monto.confirmar',$itemmonto->idmonto)}}" class="btn btn-danger btn-sm"> <i class="fas fa-edit"></i>Eliminar</a>
                                    </div>
                                </td>
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


