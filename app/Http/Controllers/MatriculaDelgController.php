<?php

namespace App\Http\Controllers;

use App\Models\Delegacion;
use App\Models\MatriculaDelegacion;
use App\Models\Monto;
use App\Models\Periodo;
use App\Models\Programaciones;
use Illuminate\Http\Request;

class MatriculaDelgController extends Controller
{
    const PAGINATION=5;
    public function index(Request $request)
    {
        $periodo= Periodo::where('estado','=','1')->get();
        $busqueda=$request->get('buscarpor');
        //$matricula=MatriculaDelegacion::where('estado','=','1')->where('idmatriculadeleg','like','%'.$busqueda.'%')->paginate($this::PAGINATION);
        $matricula = MatriculaDelegacion::join("periodos","matriculasdelegacion.idperiodo","=","periodos.idperiodo")->where('periodos.estado','=','1') ->get();
        return view('matriculadelg.index',compact('matricula','busqueda','periodo'));
    }

    public function create()
    {
        $delegacion=Delegacion::where('estado','=','1')->get();
        $monto=Monto::where('estado','=','1')->get();
        $periodo=Periodo::where('estado','=','1')->get();
        return view('matriculadelg.create',compact('delegacion','monto','periodo'));
    }

    public function store(Request $request)
    {
        
        $matricula=new MatriculaDelegacion();
        $matricula->fecha=$request->fecha;
        $matricula->hora=$request->hora;
        $matricula->iddelegacion=$request->iddelegacion;
        
        $matricula->idmonto=$request->idmonto;
        $matricula->cantidad=$request->cantidad;
        $monto = Monto::findOrFail($request->idmonto);
        $montoxpersona = $monto->montomes;
        $cantidad = $request->cantidad;
      
        $matricula->montototal=$cantidad*$montoxpersona;
        $matricula->observacion=$request->observacion;
        $matricula->estado='1';
        $matricula->idperiodo=$request->idperiodo;
        $matricula->save();
        $programaciones= new Programaciones();
        $programaciones = programaciones::findOrFail($request->idprogramacion);
        $programaciones->vacante-1;
        $programaciones->save();
      
        return redirect()->route('matriculadelg.index')->with('datos','Registro Nuevo Guardado ...!');
    }

}
