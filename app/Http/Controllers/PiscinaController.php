<?php

namespace App\Http\Controllers;
use App\Models\Piscina;
use Illuminate\Http\Request;

class PiscinaController extends Controller
{
    const PAGINATION=2;
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $piscina=Piscina::where('estado','=','1')->where('descripcion','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view('piscina.index',compact('piscina','buscarpor'));
    }
    public function create()
    {
        return view('piscina.create');
    }
    
    public function store(Request $request)
    {
        $data=request()->validate([
            'descripcion' => 'required|max:30'
        ],
        [
            'descripcion.required'=>'Ingrese descripción de categoria',
            'descripcion.max'=>'Maximo 30 carcateres para la descripción',
        ]);
        $piscina=new Piscina();
        $piscina->descripcion=$request->descripcion;
        $piscina->estado='1';
        $piscina->save();
        return redirect()->route('piscina.index')->with('datos','Registro Nuevo Guardado ...!');
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $piscina=Piscina::findOrFail($id);
        return view('piscina.edit',compact('piscina'));
    }

    
    public function update(Request $request, $id)
    {
       {
            $data=request()->validate([
                'descripcion' => 'required|max:30'
            ],
            [
                'descripcion.required'=>'Ingrese descripción de categoria',
                'descripcion.max'=>'Maximo 30 carcateres para la descripción',
            ]);
            $piscina=Piscina::findOrFail($id);
            $piscina->descripcion=$request->descripcion;
            $piscina->save();
            return redirect()->route('piscina.index')->with('datos','Registro Actualizado ...!');
        }
    
    }

    public function confirmar($id)
    {
        $piscina=Piscina::findOrFail($id); //busca el registro
        return view('piscina.confirmar',compact('piscina'));
    }
    
    public function destroy($id)
    {
        $piscina=Piscina::findOrFail($id);
        $piscina->estado='0';
        $piscina->save();
        return redirect()->route('piscina.index')->with('datos','Registro Eliminado ...!');
    }


}
