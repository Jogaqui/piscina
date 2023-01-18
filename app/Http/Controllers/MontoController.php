<?php

namespace App\Http\Controllers;
use App\Models\Monto;
use App\Models\Periodo;
use Illuminate\Http\Request;

class MontoController extends Controller
{
    const PAGINATION=5;
    public function index(Request $request)
    {
        $periodo= Periodo::where('estado','=','1')->get();
        $busqueda=$request->get('buscarpor');
        //$monto=Monto::where('estado','=','1')->where('descripcion','like','%'.$busqueda.'%')->paginate($this::PAGINATION);
        $monto = Monto::join("periodos","montos.idperiodo","=","periodos.idperiodo")->where('periodos.estado','=','1') ->get();
        return view('monto.index',compact('busqueda','periodo','monto'));
    }

    public function create()
    {
        $PERIODO=Periodo::where('estado','=','1')->get();
        return view('monto.create',compact('PERIODO'));
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'descripcion' => 'required|max:20',
            'montomes' => 'required|max:4',
            'montoclase' => 'required|max:3',
            'tipo' => 'required|max:1',

        ],
        [
            'descripcion.max'=>'Maximo 20 carcateres para la descripcion',
            'montomes.max'=>'Maximo 4 carcateres para el monto por mes',
            'montoclase.max'=>'Maximo 3 carcateres para el monto por clase',
            'tipo.max'=>'Maximo 1 carcater',
            
        ]);
        $monto=new Monto();
        $monto->descripcion=$request->descripcion;
        $monto->montomes=$request->montomes;
        $monto->montoclase=$request->montoclase;
        $monto->fechainicio=$request->fechainicio;
        $monto->fechafin=$request->fechafin;
        $monto->tipo=$request->tipo;
        $monto->estado='1';
        $monto->idperiodo=$request->idperiodo;
        $monto->save();
        return redirect()->route('monto.index')->with('datos','Registro Nuevo Guardado ...!');
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
        $monto=Monto::findOrFail($id);
        $PERIODO=Periodo::where('estado','=','1')->get();
        return view('monto.edit',compact('monto','PERIODO'));
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
            'descripcion' => 'required|max:20',
            'montomes' => 'required|max:4',
            'montoclase' => 'required|max:3',
            'tipo' => 'required|max:1',

        ],
        [
            'descripcion.max'=>'Maximo 20 carcateres para la descripcion',
            'montomes.max'=>'Maximo 4 carcateres para el monto por mes',
            'montoclase.max'=>'Maximo 3 carcateres para el monto por clase',
            'tipo.max'=>'Maximo 1 carcater',
            
        ]);
        $monto=Monto::findOrFail($id);
        $monto->descripcion=$request->descripcion;
        $monto->montomes=$request->montomes;
        $monto->montoclase=$request->montoclase;
        $monto->fechainicio=$request->fechainicio;
        $monto->fechafin=$request->fechafin;
        $monto->tipo=$request->tipo;
        $monto->idperiodo=$request->idperiodo;
        $monto->save();
        return redirect()->route('monto.index')->with('datos','Registro Actualizado ...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function confirmar($id){
        $monto=Monto::findOrFail($id);
        $PERIODO=Periodo::where('estado','=','1')->get();
        return view('monto.confirmar',compact('monto','PERIODO'));
    }
    public function destroy($id)
    {
        $monto=Monto::findOrFail($id);
        $monto->estado='0';
        $monto->save();
        return redirect()->route('monto.index')->with('datos','Registro Eliminado ...!');
    }
}
