<?php

namespace App\Http\Controllers;
use App\Models\Matricula;
use App\Models\Alumno;
use App\Models\Programaciones;
use App\Models\Descuento;
use App\Models\Monto;
use App\Models\Periodo;
use App\Models\Personal;
use App\Models\Horario;
use App\Models\Piscina;
use App\Models\Nivel;
use App\Models\Dia;
use Illuminate\Http\Request;

class AnularController extends Controller
{
    const PAGINATION=5;
    public function index(Request $request)
    {
        $busqueda=$request->get('buscarpor');
        $matricula=Matricula::where('estado','=','1')->where('idalumno','like','%'.$busqueda.'%')->paginate($this::PAGINATION);
        return view('anular.index',compact('matricula','busqueda'));
    }
    public function confirmar($id){
        $matricula=Matricula::findOrFail($id);
        $ALUMNO=Alumno::where('estado','=','1')->get();
        $PROGRAMACION=Programaciones::where('estado','=','1')->get();
        $DESCUENTO=Descuento::where('estado','=','1')->get();
        $MONTO=Monto::where('estado','=','1')->get();
        $PERIODO=Periodo::where('estado','=','1')->get();
        $PERSONAL=Personal::where('estado','=','1')->get();
        $HORARIO=Horario::where('estado','=','1')->get();
        $PISCINA=Piscina::where('estado','=','1')->get();
        $NIVEL=Nivel::where('estado','=','1')->get();
        $DIA = Dia::where('estado','=','1')->get();
        return view('anular.confirmar',compact('matricula','ALUMNO','PERSONAL','HORARIO','DESCUENTO',
        'MONTO','PERIODO','PERSONAL','HORARIO','PISCINA','NIVEL','DIA'));
    }
    public function destroy($id)
    {
        $matricula=Matricula::findOrFail($id);
        $matricula->estado='0';
        $matricula->save();
        return redirect()->route('anular.index')->with('datos','Registro Eliminado ...!');
    }
}
