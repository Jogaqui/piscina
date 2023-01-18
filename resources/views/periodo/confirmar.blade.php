@extends('layout.plantilla')
@section('titulo','Eliminar periodo')

@section('contenido')
    <strong style="font-size: 20px"> ¿Desea cambiar de periodo?</strong><br>
    <h6> Código: {{$periodo->idperiodo}}</h6>
    <h6>Descripción: {{$periodo->periodo}}</h6><br>
    <form method="POST" action="{{route('periodo.destroy',$periodo->idperiodo)}}">
        @method('delete')
        @csrf
       <button  class="btn btn-danger"> <i class="fas fa-check-square"></i>  SI </button>
       
        <a href="{{route('cancelar8')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO </a>
    </form>

@endsection
