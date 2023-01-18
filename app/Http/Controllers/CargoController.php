<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Periodo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index(Request $request){
        $buscarpor=$request->get('buscarpor');
        $periodo= Periodo::where('estado','=','1');
        $cargo = Cargo::where('estado','=','1')->where('cargo','like','%'.$buscarpor.'%')->get();
        return view('cargo.index',compact('cargo','buscarpor'));
    }

    public function create(){
        return view('cargo.create');
    }

    public function store(Request $request){
        $data=request()->validate([
            'cargo'=>'required|max:40',
        ],
        [
            'cargo.required'=>'Ingrese nombre del cargo',
            'cargo.max'=>'Máximo 40 caracteres para la descrpción',
        ]);     
        $cargo = new Cargo();
        $cargo->cargo=$request->cargo;
        $cargo->estado='1';
        $cargo->save();
        return redirect()->route('cargo.index');
    }

    public function edit($id){
        $cargo = Cargo::findOrFail($id);
        return view('cargo.edit',compact('cargo'));
    }

    public function update(Request $request,$id){
        $data=request()->validate([
            'cargo'=>'required|max:40',
        ],
        [
            'cargo.required'=>'Ingrese cargo',
            'cargo.max'=>'Máximo 40 caracteres para la descripción',
        ]); 
        $cargo = Cargo::findOrFail($id);
        $cargo->cargo=$request->cargo;
        $cargo->save();
        return redirect()->route('cargo.index');
    }

    public function confirmar($id){
        $cargo = Cargo::findOrFail($id);
        return view('cargo.confirmar',compact('cargo'));
    }

    public function destroy($id){
        $cargo = Cargo::findOrFail($id);
        $cargo->estado='0';
        $cargo->save();
        return redirect()->route('cargo.index');
    }

}
