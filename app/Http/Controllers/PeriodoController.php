<?php

namespace App\Http\Controllers;

use App\Models\Periodo;

use Illuminate\Http\Request;

class PeriodoController extends Controller
{

    public function index(Request $request){
        $buscarpor=$request->get('buscarpor');
        $periodo = periodo::where('periodo','like','%'.$buscarpor.'%')->get();
        return view('periodo.index',compact('periodo','buscarpor'));
    }

    public function create(){
        return view('periodo.create');
    }

    public function store(Request $request){
        $data=request()->validate([
            'periodo'=>'required|max:40',
        ],
        [
            'periodo.required'=>'Ingrese nombre del periodo',
            'periodo.max'=>'Máximo 40 caracteres para la descrpción',
        ]);     
        $periodo = new periodo();
        $periodo->periodo=$request->periodo;
        $periodo->estado='0';
        $periodo->save();
        return redirect()->route('periodo.index');
    }

    public function edit($id){
        $periodo = periodo::findOrFail($id);
        return view('periodo.edit',compact('periodo'));
    }

    public function update(Request $request,$id){
        $data=request()->validate([
            'periodo'=>'required|max:40',
        ],
        [
            'periodo.required'=>'Ingrese periodo',
            'periodo.max'=>'Máximo 40 caracteres para la descripción',
        ]); 

      
        $periodo = periodo::findOrFail($id);
        $periodo->periodo=$request->periodo;
        $periodo->save();
        return redirect()->route('periodo.index');
    }

    public function confirmar($id){
        $periodo = periodo::findOrFail($id);
        return view('periodo.confirmar',compact('periodo'));
    }

    public function destroy($id){
        $periodo=Periodo::where('estado', 1)->update(['estado' => '0']);
        $periodo = periodo::findOrFail($id);
        $periodo->estado='1';
        $periodo->save();
        return redirect()->route('periodo.index');
    }

}
