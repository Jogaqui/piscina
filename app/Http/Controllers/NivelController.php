<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index(Request $request){
        $buscarpor=$request->get('buscarpor');
        $nivel = nivel::where('estado','=','1')->where('descripcion','like','%'.$buscarpor.'%')->get();
        return view('nivel.index',compact('nivel','buscarpor'));
    }

    public function create(){
        return view('nivel.create');
    }

    public function store(Request $request){
        $data=request()->validate([
            'descripcion'=>'required|max:40',
        ],
        [
            'descripcion.required'=>'Ingrese nombre del nivel',
            'descripcion.max'=>'Máximo 40 caracteres para la descrpción',
        ]);     
        $nivel = new nivel();
        $nivel->descripcion=$request->descripcion;
        $nivel->estado='1';
        $nivel->save();
        return redirect()->route('nivel.index');
    }

    public function edit($id){
        $nivel = nivel::findOrFail($id);
        return view('nivel.edit',compact('nivel'));
    }

    public function update(Request $request,$id){
        $data=request()->validate([
            'descripcion'=>'required|max:40',
        ],
        [
            'descripcion.required'=>'Ingrese nivel',
            'descripcion.max'=>'Máximo 40 caracteres para la descripción',
        ]); 
        $nivel = nivel::findOrFail($id);
        $nivel->descripcion=$request->descripcion;
        $nivel->save();
        return redirect()->route('nivel.index');
    }

    public function confirmar($id){
        $nivel = nivel::findOrFail($id);
        return view('nivel.confirmar',compact('nivel'));
    }

    public function destroy($id){
        $nivel = nivel::findOrFail($id);
        $nivel->estado='0';
        $nivel->save();
        return redirect()->route('nivel.index');
    }





}
