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
use App\Models\Pago;
use App\Models\Dia;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    const PAGINATION=5;
    public function index(Request $request)
    {
        $periodo= Periodo::where('estado','=','1')->get();
        $busqueda=$request->get('busqueda');
        //$matricula=matricula::where('estado','=','1')->where('idprogramacion','like','%'.$busqueda.'%')->paginate($this::PAGINATION);
        $matricula = Matricula::join("Periodos","matriculas.idperiodo","=","Periodos.idperiodo")->where('Periodos.estado','=','1') ->get();
        return view('matricula.index',compact('busqueda','periodo','matricula'));
    }
    

    public function create()
    {
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
        $PAGO= Pago::where('estado','=','1')->get();
        return view('matricula.create',compact('ALUMNO','PROGRAMACION','DESCUENTO','MONTO','PERIODO',
        'PERSONAL','HORARIO','PISCINA','NIVEL','DIA','PAGO'));
    }

    public function store(Request $request)
    {
        // $data=request()->validate([
        //     'montotal'=> 'required',
        // ],
        // [
        //     'montotal.required'=>'Ingrese el monto',
        // ]);
        $matricula=new Matricula();
        $matricula->fecha=$request->fecha;
        $matricula->hora=$request->hora;
        $matricula->idalumno=$request->idalumno;
        $matricula->idprogramacion=$request->idprogramacion;
        $matricula->iddescuento=$request->iddescuento;
        $matricula->idmonto=$request->idmonto;
        $monto = Monto::findOrFail($request->idmonto);
        $montoxpersona = $monto->montomes;

        $descuento = Descuento::findOrFail($request->iddescuento);
        $descuentos = $descuento->montod;

        $matricula->montotal=$montoxpersona-$descuentos;
        $matricula->estado='1';
        $matricula->idpago=$request->idpago;
        $matricula->idperiodo=$request->idperiodo;
        $matricula->save();

        Programaciones::ActualizarVacante($request->idprogramacion);
        return redirect()->route('matricula.index')->with('datos','Registro Nuevo Guardado ...!');
    }

 
    public function edit($id)
    {
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
        $PAGO = Pago::where('estado','=','1')->get();
        return view('matricula.edit',compact('matricula','ALUMNO','PROGRAMACION','DESCUENTO','MONTO',
        'PERIODO','PERSONAL','HORARIO','PISCINA','NIVEL','DIA','PAGO'));
    }

    public function update(Request $request, $id)
    {
        //  $data=request()->validate([
           
            

        //  ],
        //  [
           
             
        //  ]);
        $matricula=Matricula::findOrFail($id);
        $matricula->fecha=$request->fecha;
        $matricula->hora=$request->hora;
        $matricula->idalumno=$request->idalumno;
        $matricula->idprogramacion=$request->idprogramacion;
        $matricula->iddescuento=$request->iddescuento;
        $matricula->idmonto=$request->idmonto;
        $matricula->montotal=$request->montotal;

        
        // $monto = Monto::findOrFail($request->idmonto);
        // $montoxpersona = $monto->montomes;

        // $descuento = Descuento::findOrFail($request->iddescuento);
        // $descuentos = $descuento->montod;

        // $matricula->montotal=$montoxpersona-$descuentos;

        $matricula->idpago=$request->idpago;
        $matricula->idperiodo=$request->idperiodo;
        $matricula->save();
        //return view('matricula.create');
        return redirect()->route('matricula.index')->with('datos','Registro Actualizado ...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function confirmar($id){
        $matricula=Matricula::findOrFail($id);
        $ALUMNO=Alumno::where('estado','=','1')->get();
        $PROGRAMACION=Programaciones::where('estado','=','1')->get();
        $DESCUENTO=Descuento::where('estado','=','1')->get();
        $MONTO=Monto::where('estado','=','1')->get();
        $PAGO=Pago::where('estado','=','1')->get();
        $PERIODO=Periodo::where('estado','=','1')->get();
        return view('matricula.confirmar',compact('matricula','ALUMNO','PERSONAL','HORARIO','DESCUENTO',
        'MONTO','PAGO','PERIODO'));
    }
    public function destroy($id)
    {
        $matricula=Matricula::findOrFail($id);
        $matricula->estado='0';
        $matricula->save();
        return redirect()->route('matricula.index')->with('datos','Registro Eliminado ...!');
    }

    public function ProgramacionCodigo($idprogramacion){
        return Programaciones::where('idprogramacion','=',$idprogramacion)
        ->get();
    }
}
