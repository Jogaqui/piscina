<?php

namespace App\Http\Controllers;

use App\Models\Dia;
use App\Models\Horario;
use App\Models\Nivel;
use App\Models\Periodo;
use App\Models\Personal;
use App\Models\Piscina;
use App\Models\Programaciones;
use Illuminate\Http\Request;

class ProgramacionesController extends Controller
{
    //
    const PAGINATION=5;
    public function index(Request $request)
    {
        $periodo= Periodo::where('estado','=','1')->get();
        //$buscar=$request->get('buscar');
        //$programaciones=Programaciones::where('estado','=','1')->where('idprogramacion','like','%'.$buscar.'%')->paginate($this::PAGINATION);
        $programaciones = Programaciones::join("periodos","programaciones.idperiodo","=","periodos.idperiodo")->where('periodos.estado','=','1') ->get();
        return view('programaciones.index',compact('periodo','programaciones'));
    }

    public function create()
    {
        $PERIODO=Periodo::where('estado','=','1')->get();
        $PERSONAL=Personal::where('estado','=','1')->get();
        $HORARIO=Horario::where('estado','=','1')->get();
        $PISCINA=Piscina::where('estado','=','1')->get();
        $NIVEL=Nivel::where('estado','=','1')->get();
        $DIA = Dia::where('estado','=','1')->get();
       
        return view('programaciones.create',compact('PERIODO','PERSONAL','HORARIO','PISCINA','NIVEL', 'DIA'));
    }

    public function store(Request $request)
    {
        // $data=request()->validate([
        //     'montotal'=> 'required|max:10',
        // ],
        // [
        //     'montotal.max'=>'Maximo 10 carcateres para el monto',
        // ]);
        $programaciones=new Programaciones();
        $programaciones->idperiodo=$request->idperiodo;
        $programaciones->idpersonal=$request->idpersonal;
        $programaciones->idhorario=$request->idhorario;
        $programaciones->idpiscina=$request->idpiscina;
        $programaciones->idnivel=$request->idnivel;
        $programaciones->vacante=$request->vacante;
        $programaciones->estado='1';

        $programaciones->save();
        return redirect()->route('programaciones.index')->with('datos','Registro Nuevo Guardado ...!');
    }
    public function edit($id)
    {
        $programaciones=Programaciones::findOrFail($id);
        $PERIODO=Periodo::where('estado','=','1')->get();
        $PERSONAL=Personal::where('estado','=','1')->get();
        $HORARIO=Horario::where('estado','=','1')->get();
        $PISCINA=Piscina::where('estado','=','1')->get();
        $NIVEL=Nivel::where('estado','=','1')->get();
        $DIA = Dia::where('estado','=','1')->get();

        return view('programaciones.edit',compact('programaciones','PERIODO','PERSONAL','HORARIO','PISCINA','NIVEL', 'DIA'));
    }

    public function update(Request $request, $id)
    {
        // $data=request()->validate([
        //     'fecha' => 'required|max:10',
        //     'hora' => 'required|max:10',
        //     'montotal'=> 'required|max:10',

        // ],
        // [
        //     'fecha.required'=>'Ingrese la fecha',
        //     'hora.required'=>'Maximo 10 carcateres para la hora',
        //     'montotal.max'=>'Maximo 10 carcateres para el monto',
        // ]);
        $programaciones=Programaciones::findOrFail($id);
        $programaciones->idperiodo=$request->idperiodo;
        $programaciones->idpersonal=$request->idpersonal;
        $programaciones->idhorario=$request->idhorario;
        $programaciones->idpiscina=$request->idpiscina;
        $programaciones->idnivel=$request->idnivel;
        $programaciones->vacante=$request->vacante;

        $programaciones->save();
        return redirect()->route('programaciones.index')->with('datos','Registro Nuevo Guardado ...!');
    }

    public function confirmar($id){
        $programaciones=Programaciones::findOrFail($id);
        $PERIODO=Periodo::where('estado','=','1')->get();
        $PERSONAL=Personal::where('estado','=','1')->get();
        $HORARIO=Horario::where('estado','=','1')->get();
        $PISCINA=Piscina::where('estado','=','1')->get();
        $NIVEL=Nivel::where('estado','=','1')->get();
        $DIA = Dia::where('estado','=','1')->get();

        return view('programaciones.confirmar',compact('programaciones','PERIODO','PERSONAL','HORARIO','PISCINA','NIVEL', 'DIA'));
    }
    public function destroy($id)
    {
        $programaciones=Programaciones::findOrFail($id);
        $programaciones->estado='0';
        $programaciones->save();
        return redirect()->route('programaciones.index')->with('datos','Registro Eliminado ...!');
    }

    

}
