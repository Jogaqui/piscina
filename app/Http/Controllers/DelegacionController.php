<?php

namespace App\Http\Controllers;

use App\Models\Delegacion;
use Illuminate\Http\Request;

class DelegacionController extends Controller
{
    const PAGINATION=5;
    public function index(Request $request)
    {
        $buscar=$request->get('buscar');
        $delegacion=Delegacion::where('estado','=','1')->where('ruc','like','%'.$buscar.'%')->paginate($this::PAGINATION);
        return view('delegacion.index',compact('delegacion','buscar'));
    }
    public function create()
    {
        return view('delegacion.create');
    }
    public function store(Request $request)
    {
        $data=request()->validate([
            'ruc' => 'numeric|required',
            'razonsocial' => 'required|max:40',
            'direccion' => 'required|max:40',
            'tipocliente' => 'required|max:15'
        ],
        [
            'ruc.required'=>'Ingrese RUC de la empresa',
            'ruc.numeric'=>'El RUC debe ser solo numeros',
            'razonsocial.required'=>'Ingrese razon social de la empresa',
            'razonsocial.max'=>'Maximo 40 carateres para la razon social',
            'direccion.required'=>'Ingrese direccion de la empresa',
            'direccion.max'=>'Maximo 40 carateres para la dirección',
            'tipocliente.required'=>'Ingrese tipo de cliente de la empresa',
            'tipocliente.max'=>'Maximo 20 carateres para el tipocliente',
        ]);
        $delegacion=new Delegacion();
        $delegacion->ruc=$request->ruc;
        $delegacion->razonsocial=$request->razonsocial;
        $delegacion->direccion=$request->direccion;
        $delegacion->tipocliente=$request->tipocliente;
        $delegacion->estado='1';
        $delegacion->save();
        return redirect()->route('delegacion.index')->with('datos','Registro Nuevo Guardado ...!');
    }
    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'ruc' => 'numeric|required',
            'razonsocial' => 'required|max:40',
            'direccion' => 'required|max:40',
            'tipocliente' => 'required|max:15'
        ],
        [
            'ruc.required'=>'Ingrese RUC de la empresa',
            'ruc.numeric'=>'El RUC debe ser solo numeros',
            'razonsocial.required'=>'Ingrese razon social de la empresa',
            'razonsocial.max'=>'Maximo 40 carateres para la razon social',
            'direccion.required'=>'Ingrese direccion de la empresa',
            'direccion.max'=>'Maximo 40 carateres para la dirección',
            'tipocliente.required'=>'Ingrese tipo de cliente de la empresa',
            'tipocliente.max'=>'Maximo 20 carateres para el tipocliente',
        ]);
        $delegacion=Delegacion::findOrFail($id);
        $delegacion->ruc=$request->ruc;
        $delegacion->razonsocial=$request->razonsocial;
        $delegacion->direccion=$request->direccion;
        $delegacion->tipocliente=$request->tipocliente;
        $delegacion->estado='1';
        $delegacion->save();
        return redirect()->route('delegacion.index')->with('datos','Registro Actualizado ...!');
    }

    public function edit($id)
    {
        $delegacion=Delegacion::findOrFail($id);
        return view('delegacion.edit',compact('delegacion'));
    }

    public function confirmar($id){
        $delegacion=Delegacion::findOrFail($id);
        return view('delegacion.confirmar',compact('delegacion'));
    }
    public function destroy($id)
    {
        $delegacion=Delegacion::findOrFail($id);
        $delegacion->estado='0';
        $delegacion->save();
        return redirect()->route('delegacion.index')->with('datos','Registro Eliminado ...!');
    }
}
