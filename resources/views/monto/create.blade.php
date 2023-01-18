@extends('layout.plantilla')
@section('titulo','Registrar un nuevo monto')
@section('contenido')

    <div  class="content content--top-nav"">
        <H1 style="font-size: 25px; font-weight: bold; color: rgb(0, 177, 94)">Registrar Nuevo Monto</H1>
        <div class="grid grid-cols-12 gap-6 mt-5" >
            <div class="intro-y col-span-12 lg:col-span-6" >
                <div class="intro-y box">   
                    <div id="input" class="p-5" style="background: rgb(255, 255, 255)">
                        <div class="preview">   
        <form method="POST" action="{{route('monto.store')}}">
            @csrf
            <div class="form-group">
                <label class="control-label">PERIODO:</label>
                <select class="form-control" name="idperiodo" id="idperiodo">
                    @foreach($PERIODO as $itemperiodo)
                        <option value="{{$itemperiodo['idperiodo']}}">
                            {{$itemperiodo['periodo']}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">DESCRIPCION:</label>
                <input class="form-control @error('descripcion') is-invalid @enderror" type="text"  id="descripcion" name="descripcion" />
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">MONTO MES:</label>
                <input class="form-control @error('montomes') is-invalid @enderror" type="text"  id="montomes" name="montomes" />
                    @error('montomes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">MONTO CLASE:</label>
                <input class="form-control @error('montoclase') is-invalid @enderror" type="text"  id="montoclase" name="montoclase" />
                    @error('montoclase')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">FECHA INICIO:</label>
                <input class="form-control @error('fechainicio') is-invalid @enderror" type="date"  id="fechainicio" name="fechainicio" />
                    @error('fechainicio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">FECHA FIN:</label>
                <input class="form-control @error('fechafin') is-invalid @enderror" type="date"  id="fechafin" name="fechafin" />
                    @error('fechafin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">TIPO:</label>
                <input class="form-control @error('tipo') is-invalid @enderror" type="text"  id="tipo" name="tipo" />
                    @error('tipo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <br>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save">Guardar</i></button>
            <a href="{{route('cancelar2')}}" class="btn btn-danger"><i class="fas fa-ban">Cancelar</i></a>
        </form>
    </div>
</div>
    </div>
    </div>

</div>

</div>
@endsection