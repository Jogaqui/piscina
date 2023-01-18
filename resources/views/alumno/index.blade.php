@extends('layout.plantilla')

@section('titulo','REGISTRO DE ALUMNOS')

@section('contenido')

<div class="card-body">
    <h2 class="intro-y text-lg font-medium mt-10">REGISTRAR ALUMNO</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2"> <a href="{{route('alumno.create')}}">Agregar Alumno</a></button>
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
                        <input name="buscar" type="text" class="form-control w-56" placeholder="Buscar por DNI" value="{{$buscar}}">
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
                        <th class="text-center whitespace-nowrap">CÒDIGO</th>
                        <th class="text-center whitespace-nowrap">DNI</th>
                        <th class="text-center whitespace-nowrap">NOMBRES</th>
                        <th class="text-center whitespace-nowrap">APELLIDOS</th>
                        <th class="text-center whitespace-nowrap">EDAD</th>
                        <th class="whitespace-nowrap text-center">DIRECCION</th>
                        <th class="whitespace-nowrap">TELEFONO</th>
                        <th class="text-center whitespace-nowrap">SEXO</th>
                        <th class="text-center whitespace-nowrap">TIPO</th>
                        <th class="text-center whitespace-nowrap">TIPO CLIENTE</th>
                        <th class="whitespace-nowrap text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumno as $itemalumno)
                                <tr class="intro-x">
                                    <td class="text-center">{{$itemalumno->idalumno}}</td>
                                    <td class="text-center">{{$itemalumno->dni}}</td>
                                    <td class="text-center">{{$itemalumno->nombres}}</td>
                                    <td class="text-center">{{$itemalumno->apellidos}}</td>
                                    <td class="text-center">{{$itemalumno->edad}}</td>
                                    <td class="text-center">{{$itemalumno->direccion}}</td>
                                    <td class="text-center">{{$itemalumno->telefono}}</td>
                                    <td class="text-center">{{$itemalumno->sexo}}</td>
                                    <td class="text-center">{{$itemalumno->tipo}}</td>
                                    <td class="text-center">{{$itemalumno->tipocliente}}</td>
                                    <td class="table-report__action w-40">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3 btn btn-info btn-sm" href="{{route('alumno.edit',$itemalumno->idalumno)}}"><i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Editar </a>
                                            <a class="flex items-center text-danger btn btn-info btn-sm" href="{{route('alumno.confirmar',$itemalumno->idalumno)}}" data-tw-toggle="modal" > <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Eliminar </a>
                                        </div>
                                    </td>
                                </tr>
                        @endforeach
                </tbody>
            </table>
            {{$alumno->links()}}
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