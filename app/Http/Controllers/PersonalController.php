<?php

namespace App\Http\Controllers;
use App\Models\Personal;
use App\Models\Cargo;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    const PAGINATION=5;
    public function index(Request $request)
    {
        $busqueda=$request->get('buscarpor');
        $personal=Personal::where('estado','=','1')->where('dni','like','%'.$busqueda.'%')->paginate($this::PAGINATION);
        return view('personal.index',compact('personal','busqueda'));
    }

    public function create()
    {
        $CARGO=Cargo::where('estado','=','1')->get();
        return view('personal.create',compact('CARGO'));
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'dni' => 'required|max:8',
            'nombres' => 'required|max:20',
            'apellidos' => 'required|max:20',
            'direccion' => 'required|max:40',
            'telefono' => 'required|max:9',

        ],
        [
            'dni.required'=>'Ingrese dni del personal',
            'nombres.max'=>'Maximo 20 carcateres para los nombres',
            'apellidos.max'=>'Maximo 20 carcateres para los apellidos',
            'direccion.max'=>'Maximo 40 carcateres para la dirección',
            'telefono.max'=>'Maximo 9 carcateres para el teléfono',
            
        ]);
        $personal=new Personal();
        $personal->dni=$request->dni;
        $personal->nombres=$request->nombres;
        $personal->apellidos=$request->apellidos;
        $personal->direccion=$request->direccion;
        $personal->telefono=$request->telefono;
        $personal->idcargo=$request->idcargo;
        $personal->estado='1';
        $personal->save();
        return redirect()->route('personal.index')->with('datos','Registro Nuevo Guardado ...!');
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
        $personal=Personal::findOrFail($id);
        $CARGO=Cargo::where('estado','=','1')->get();
        return view('personal.edit',compact('personal','CARGO'));
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
            'dni' => 'required|max:8',
            'nombres' => 'required|max:20',
            'apellidos' => 'required|max:20',
            'direccion' => 'required|max:40',
            'telefono' => 'required|max:9',

        ],
        [
            'dni.required'=>'Ingrese dni del personal',
            'nombres.max'=>'Maximo 20 carcateres para los nombres',
            'apellidos.max'=>'Maximo 20 carcateres para los apellidos',
            'direccion.max'=>'Maximo 40 carcateres para la dirección',
            'telefono.max'=>'Maximo 9 carcateres para el teléfono',
            
        ]);
        $personal=Personal::findOrFail($id);
        $personal->dni=$request->dni;
        $personal->nombres=$request->nombres;
        $personal->apellidos=$request->apellidos;
        $personal->direccion=$request->direccion;
        $personal->telefono=$request->telefono;
        $personal->idcargo=$request->idcargo;
        $personal->save();
        return redirect()->route('personal.index')->with('datos','Registro Actualizado ...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function confirmar($id){
        $personal=Personal::findOrFail($id);
        $CARGO=Cargo::where('estado','=','1')->get();
        return view('personal.confirmar',compact('personal','CARGO'));
    }
    public function destroy($id)
    {
        $personal=Personal::findOrFail($id);
        $personal->estado='0';
        $personal->save();
        return redirect()->route('personal.index')->with('datos','Registro Eliminado ...!');
    }
}
