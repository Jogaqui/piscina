@extends('layout.plantilla')
@section('titulo','Actualizar datos del monto')
@section('contenido')

    <div class="content">
        <h1>Actualizar monto</h1>
        <form method="POST" action="{{route('monto.update',$monto->idmonto)}}">
            @method('put')
            @csrf
            <div class="form-group">
                <label class="control-label">CÓDIGO</label>
                <input type="text" class="form-control" id="idmonto" name="idmonto" value="{{$monto->idmonto}}" disabled/>
            </div>
            <div class="form-group">
                <label class="control-label">PERIODO:</label>
                <select class="form-control" name="idperiodo" id="idperiodo">
                    <option selected disabled value="">Elegir</option>
                    @foreach($PERIODO as $itemperiodo)
                        <option value="{{$itemperiodo['idperiodo']}}" {{$itemperiodo->idperiodo == $monto->idperiodo ? 'selected':''}}>{{$itemperiodo['periodo']}}</option>
                    @endforeach
                   
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">DESCRIPCION:</label>
                <input class="form-control @error('descripcion') is-invalid @enderror" type="text"  id="descripcion" name="descripcion" value="{{$monto->descripcion}}"/>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">MONTO MES:</label>
                <input class="form-control @error('montomes') is-invalid @enderror" type="text"  id="montomes" name="montomes" value="{{$monto->montomes}}"/>
                    @error('montomes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">MONTO CLASE:</label>
                <input class="form-control @error('montoclase') is-invalid @enderror" type="text"  id="montoclase" name="montoclase" value="{{$monto->montoclase}}"/>
                    @error('montoclase')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">FECHA INICIO:</label>
                <input class="form-control @error('fechainicio') is-invalid @enderror" type="text"  id="fechainicio" name="fechainicio" value="{{$monto->fechainicio}}"/>
                    @error('fechainicio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">FECHA FIN:</label>
                <input class="form-control @error('fechafin') is-invalid @enderror" type="date"  id="fechafin" name="fechafin" value="{{$monto->fechafin}}"/>
                    @error('fechafin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">TIPO:</label>
                <input class="form-control @error('tipo') is-invalid @enderror" type="text"  id="tipo" name="tipo" value="{{$monto->tipo}}"/>
                    @error('tipo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            
            <button type="submit" class="btn btn-primary"><i class="fas fa-save">Actualizar</i></button>
            <a href="{{route('cancelar10')}}" class="btn btn-danger"><i class="fas fa-ban">Cancelar</i></a>
        </form>
        <br>
    </div>
@endsection