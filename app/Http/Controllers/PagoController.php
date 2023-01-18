<?php

namespace App\Http\Controllers;
use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index(Request $request){
        $buscarpor=$request->get('buscarpor');
        $PAGO = Pago::where('estado','=','1')->where('pago','like','%'.$buscarpor.'%')->get();
        return view('pago.index',compact('PAGO','buscarpor'));
    }

    public function create(){
        return view('pago.create');
    }

    public function store(Request $request){
        $data=request()->validate([
            'pago'=>'required|max:10',
        ],
        [
            'pago.required'=>'Ingrese nombre del Medio de Pago',
            'pago.max'=>'Máximo 10 caracteres para el pago',
        ]);     
        $PAGO = new Pago();
        $PAGO->pago=$request->pago;
        $PAGO->estado='1';
        $PAGO->save();
        return redirect()->route('pago.index');
    }

    public function edit($id){
        $PAGO = Pago::findOrFail($id);
        return view('pago.edit',compact('PAGO'));
    }

    public function update(Request $request,$id){
        $data=request()->validate([
            'pago'=>'required|max:10',
        ],
        [
            'pago.required'=>'Ingrese Medio de Pago',
            'pago.max'=>'Máximo 10 caracteres para el pago',
        ]); 
        $PAGO = Pago::findOrFail($id);
        $PAGO->pago=$request->pago;
        $PAGO->save();
        return redirect()->route('pago.index');
    }

    public function confirmar($id){
        $PAGO = Pago::findOrFail($id);
        return view('pago.confirmar',compact('PAGO'));
    }

    public function destroy($id){
        $PAGO = Pago::findOrFail($id);
        $PAGO->estado='0';
        $PAGO->save();
        return redirect()->route('pago.index');
    }
}
