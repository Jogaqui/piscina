<?php

namespace App\Http\Controllers;
use App\Models\Horario;
use App\Models\Dia;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    const PAGINATION=5;
    public function index(Request $request)
    {
        $busqueda=$request->get('buscarpor');
        $horario=Horario::where('estado','=','1')->where('descripcion','like','%'.$busqueda.'%')->paginate($this::PAGINATION);
        return view('horario.index',compact('horario','busqueda'));
    }

    public function create()
    {
        $DIA=Dia::where('estado','=','1')->get();
        return view('horario.create',compact('DIA'));
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'descripcion' => 'required|max:40',
        ],
        [
            'descripcion.max'=>'Maximo 40 carcateres para la descripcion',
        ]);
        $horario=new Horario();
        $horario->descripcion=$request->descripcion;
        $horario->iddia=$request->iddia;
        $horario->estado='1';
        $horario->save();
        return redirect()->route('horario.index')->with('datos','Registro Nuevo Guardado ...!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horario=Horario::findOrFail($id);
        $DIA=Dia::where('estado','=','1')->get();
        return view('horario.edit',compact('horario','DIA'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'descripcion' => 'required|max:40',
        ],
        [
            'descripcion.max'=>'Maximo 40 carcateres para la descripcion',
        ]);
        $horario=Horario::findOrFail($id);
        $horario->descripcion=$request->descripcion;
        $horario->iddia=$request->iddia;
        $horario->save();
        return redirect()->route('horario.index')->with('datos','Registro Actualizado ...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function confirmar($id){
        $horario=Horario::findOrFail($id);
        $DIA=Dia::where('estado','=','1')->get();
        return view('horario.confirmar',compact('horario','DIA'));
    }
    public function destroy($id)
    {
        $horario=Horario::findOrFail($id);
        $horario->estado='0';
        $horario->save();
        return redirect()->route('horario.index')->with('datos','Registro Eliminado ...!');
    }
}
