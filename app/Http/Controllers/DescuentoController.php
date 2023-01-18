<?php

namespace App\Http\Controllers;

use App\Models\Descuento;
use App\Models\Periodo;
use Illuminate\Http\Request;

class DescuentoController extends Controller
{
    const PAGINATION=5;
    public function index(Request $request){
      $periodo= Periodo::where('estado','=','1')->get();
      $buscarpor=$request->get('buscarpor');
      //$descuento = Descuento::where('estado','=','1')->where('descripcion','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);   
      $descuento = Descuento::join("periodos","descuentos.idperiodo","=","periodos.idperiodo")->where('periodos.estado','=','1')->get();
      return view('descuento.index',compact('buscarpor','periodo','descuento'));
    }

    public function create(){
        $periodo = Periodo::where('estado','=','1')->get();
        return view('descuento.create',compact('periodo'));
    }

    public function store(Request $request){
        $data=request()->validate([
            'descripcion'=>'required|max:40',
            'montod'=>'required',
        ],
        [
            'descripcion.required'=>'Ingrese la descripcion del día',
            'descripcion.max'=>'Máximo 40 caracteres para la descrpción',
            'montod.required'=>'Ingrese el monto',
        ]);     
        $descuento = new Descuento();
        $descuento->descripcion=$request->descripcion;
        $descuento->montod=$request->montod;
        $descuento->idperiodo=$request->idperiodo;
        $descuento->estado='1';
        $descuento->save();
        return redirect()->route('descuento.index')->with('datos','Registro Nuevo Guardado ...!');
    }

    public function edit($id){
        $descuento = Descuento::findOrFail($id);
        return view('descuento.edit',compact('descuento'));
    }

    public function update(Request $request,$id){
        $data=request()->validate([
            'descripcion'=>'required|max:40',
            'montod'=>'required',
        ],
        [
            'descripcion.required'=>'Ingrese la descripcion del día',
            'descripcion.max'=>'Máximo 40 caracteres para la descrpción',
            'montod.required'=>'Ingrese el monto',
        ]);  
        $descuento = Descuento::findOrFail($id);
        $descuento->descripcion=$request->descripcion;
        $descuento->montod=$request->montod;
        $descuento->save();
        return redirect()->route('descuento.index')->with('datos','Registro Actualizado ...!');
    }

    public function confirmar($id){
        $descuento = Descuento::findOrFail($id);
        return view('descuento.confirmar',compact('descuento'));
    }

    public function destroy($id){
        $descuento = Descuento::findOrFail($id);
        $descuento->estado='0';
        $descuento->save();
        return redirect()->route('descuento.index')->with('datos','Registro Eliminado ...!');
    }
}
