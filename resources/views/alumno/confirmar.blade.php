@extends('layout.plantilla')
@section('titulo', 'Eliminar alumno')
@section('contenido')
      <br><br>
        <H1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">¿Desea eliminar registro?</H1>
        <br>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
               <div class="form-group" style="padding-left: 25px">
                  <br><label class="control-label">CÓDIGO</label>
                  <input type="text" class="form-control" placeholder="{{$alumno->idalumno}}" disabled/>
               </div><br>
               <div class="form-group" style="padding-left: 25px">
                  <label class="control-label">DNI:</label>
                  <input type="text" class="form-control" placeholder="{{$alumno->dni}}" disabled/>
               </div><br>
               <div class="form-group" style="padding-left: 25px">
                  <label class="control-label">NOMBRES:</label>
                  <input type="text" class="form-control" placeholder="{{$alumno->nombres}}" disabled/>
               </div><br>
               <div class="form-group" style="padding-left: 25px">
                  <label class="control-label">APELLIDOS:</label>
                  <input type="text" class="form-control" placeholder="{{$alumno->apellidos}}" disabled/>
               </div><br>
               <div class="form-group" style="padding-left: 25px">
                  <label class="control-label">EDAD:</label>
                  <input type="text" class="form-control" placeholder="{{$alumno->edad}}" disabled/>
               </div><br>
               <div class="form-group"style="padding-left: 25px">
                  <label class="control-label">DIRECCION:</label>
                  <input type="text" class="form-control" placeholder="{{$alumno->direccion}}" disabled/>
               </div><br>
               <div class="form-group"style="padding-left: 25px">
                  <label class="control-label">TELEFONO:</label>
                  <input type="text" class="form-control" placeholder="{{$alumno->telefono}}" disabled/>
               </div><br>
               <div class="form-group" style="padding-left: 25px">
                  <label class="control-label">SEXO:</label>
                  <input type="text" class="form-control" placeholder="{{$alumno->sexo}}" disabled/>
               </div><br>
               <div class="form-group" style="padding-left: 25px">
                  <label class="control-label">TIPO:</label>
                  <input type="text" class="form-control" placeholder="{{$alumno->tipo}}" disabled/>
               </div><br>
               <div class="form-group" style="padding-left: 25px">
                  <label class="control-label">TIPO DE CLIENTE:</label>
                  <input type="text" class="form-control" placeholder="{{$alumno->tipocliente}}" disabled/>
               </div><br>

               <form method="POST"  action="{{route('alumno.destroy',$alumno->idalumno)}}" style="padding-left: 25px">
                     @method('delete')
                     @csrf
                     <button class="btn btn-danger mr-2"> <i class="fas fa-check-square"></i> Eliminar </button>
                     <a href="{{route('cancelar')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> Cancelar </a>
               </form>
            </div>  
         </div>    
   
@endsection