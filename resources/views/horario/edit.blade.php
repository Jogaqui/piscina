@extends('layout.plantilla')
@section('titulo','Actualizar datos del Horario')
@section('contenido')

    <div class="content">
        <h1>Actualizar Horario</h1>
        <form method="POST" action="{{route('horario.update',$horario->idhorario)}}">
            @method('put')
            @csrf
            <div class="form-group">
                <label class="control-label">CÓDIGO</label>
                <input type="text" class="form-control" id="id" name="id" value="{{$horario->idhorario}}" disabled/>
            </div>
            <div class="form-group">
                <label class="control-label">DESCRIPCIÓN:</label>
                <input class="form-control @error('descripcion') is-invalid @enderror" type="text"  id="descripcion" name="descripcion" value="{{$horario->descripcion}}"/>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="control-label">DÍAS:</label>
                <select class="form-control" name="iddia" id="iddia">
                    @foreach($DIA as $itemdia)
                        <option value="{{$itemdia['iddia']}}" {{$itemdia->iddia == $horario->iddia ? 'selected':''}}>{{$itemdia['descripcion']}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save">Actualizar</i></button>
            <a href="{{route('cancelar5')}}" class="btn btn-danger"><i class="fas fa-ban">Cancelar</i></a>
        </form>
        <br>
    </div>
@endsection