@extends('layout.plantilla')

@section('titulo','Descuento')

@section('contenido')

<div class="card-body">
        <h2 class="intro-y text-lg font-medium mt-10">REGISTRAR DESCUENTO</h2>
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
                <button class="btn btn-primary shadow-md mr-2"> <a href="{{route('descuento.create')}}">Agregar Descuento</a></button>
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
                            <input name="buscarpor" type="text" class="form-control w-56" placeholder="Buscar por Descripción" value="{{$buscarpor}}">
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
                            <th class="text-center">CÓDIGO</th>
                            <th class="text-center">DESCRIPCIÓN</th>
                            <th class="text-center">MONTO</th>
                            <th class="text-center">PERIODO</th>
                            <th class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($descuento)<=0)
                                <tr>
                                <td colspan="3"><b>No hay Registros</b></td>
                                </tr>
                        @else
                                @foreach($descuento as $item)
                                    <tr class="intro-x">
                                        <td class="text-center">{{$item->iddescuento}}</td>
                                        <td class="text-center">{{$item->descripcion}}</td>
                                        <td class="text-center">S/.{{$item->montod}}</td>
                                        <td class="text-center">   
                                            @foreach ($periodo as $itemp)
                                            @if ($itemp->idperiodo==$item->idperiodo)
                                                {{$itemp->periodo}}
                                            @endif
                                             @endforeach
                                        </td>
                                        <td class="table-report__action w-40">
                                            <div class="flex justify-center items-center">
                                                
                                                <a class="flex items-center mr-3" href="{{route('descuento.edit',$item->iddescuento)}}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Editar </a>
                                                <a class="flex items-center text-danger" href="{{route('descuento.confirmar',$item->iddescuento)}}" data-tw-toggle="modal" > <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Eliminar </a>
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