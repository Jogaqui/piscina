@extends('layout.plantilla')
@section('titulo','PERIODO')

@section('contenido')

                            
    <div class="card-body">
       
        <h2 class="intro-y text-lg font-medium mt-10">REGISTRAR PERIODO</h2>
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
                <a href="{{route('periodo.create')}}"> <button class="btn btn-primary shadow-md mr-2">Agregar Periodo</button></a>
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
                        <input name="buscarpor" type="text" class="form-control w-56" placeholder="Buscar por periodo" value="{{$buscarpor}}">
                    <button class="btn btn-primary shadow-md mr-2">Buscar</button> 
                    </form>  
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center">CÓDIGO</th>
                        <th class="text-center"> PERIODO</th>
                        <th class="text-center"> ESTADO</th>
                        <th class="text-center whitespace-nowrap">OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($periodo)<=0)
                        <tr class="intro-x">
                            <td class="text-center">No hay registros</td>
                        </tr>
                    @else
                        @foreach($periodo as $item)
                            <tr class="intro-x">
                                <td class="text-center">{{$item->idperiodo}}</td>
                                <td class="text-center">{{$item->periodo}}</td>
                                <td class="text-center">
                                    @if($item->estado==1)
                                       <span style="color: rgb(13, 143, 67); font-weight: bold; font-size: 18px " >  Activo </span>
                                    @else
                                        <span style="color: rgb(248, 0, 0);font-size: 18px; font-style: italic" >  No Activo </span>
                                    @endif
                                </td>
                                <td  class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                    @if($item->estado==1)
                                    <a href="{{route('periodo.confirmar',$item->idperiodo)}}" class="btn btn- btn-sm" style="background: rgb(0, 255, 136); font-weight: bold"> <i class="fas fa-edit"></i>ACTIVADO</a>
                                     @else
                                     <a href="{{route('periodo.confirmar',$item->idperiodo)}}" class="btn btn-danger btn-sm"> <i class="fas fa-edit"></i>ACTIVAR</a>
                                     @endif                                  
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