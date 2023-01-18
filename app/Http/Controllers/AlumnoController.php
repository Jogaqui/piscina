<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    const PAGINATION=5;
    public function index(Request $request)
    {
        $buscar=$request->get('buscar');
        $alumno=Alumno::where('estado','=','1')->where('dni','like','%'.$buscar.'%')->paginate($this::PAGINATION);
        return view('alumno.index',compact('alumno','buscar'));
    }
    public function create()
    {
        return view('alumno.create');
    }
    public function store(Request $request)
    {
        $data=request()->validate([
            'dni' => 'numeric|required|unique:alumnos,dni',
            'nombres' => 'required|max:20',
            'apellidos' => 'required|max:20',
            'edad' => 'required|max:2',
            'direccion' => 'required|max:40',
            'telefono' => 'required|max:9',
            'sexo' => 'required|max:10',
            'tipo' => 'required|max:20',
            'tipocliente' => 'required|max:20'
        ],
        [
            'dni.required'=>'Ingrese dni del personal',
            'dni.unique'=>'DNI repetido',
            'dni.numeric'=>'El DNI debe ser solo numeros',
            'nombres.max'=>'Maximo 20 carateres para los nombres',
            'apellidos.max'=>'Maximo 20 carateres para los apellidos',
            'edad.max'=>'Maximo 2 carateres para la edad',
            'direccion.max'=>'Maximo 40 carateres para la dirección',
            'telefono.max'=>'Maximo 9 carateres para el teléfono',
            'sexo.max'=>'Maximo 10 carateres para el sexo',
            'tipo.max'=>'Maximo 20 carateres para el tipo',
            'tipocliente.max'=>'Maximo 20 carateres para el tipocliente',
            
        ]);
        $alumno=new Alumno();
        $alumno->dni=$request->dni;
        $alumno->nombres=$request->nombres;
        $alumno->apellidos=$request->apellidos;
        $alumno->edad=$request->edad;
        $alumno->direccion=$request->direccion;
        $alumno->telefono=$request->telefono;
        $alumno->sexo=$request->sexo;
        $alumno->tipo=$request->tipo;
        $alumno->tipocliente=$request->tipocliente;
        $alumno->estado='1';
        $alumno->save();
        return redirect()->route('alumno.index')->with('datos','Registro Nuevo Guardado ...!');
    }
    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'dni' => 'numeric|required',
            'nombres' => 'required|max:20',
            'apellidos' => 'required|max:20',
            'edad' => 'required|max:9',
            'direccion' => 'required|max:40',
            'telefono' => 'required|max:9',
            'sexo' => 'required|max:10',
            'tipo' => 'required|max:20',
            'tipocliente' => 'required|max:20'
        ],
        [
            'dni.required'=>'Ingrese dni del Alumno',
            'dni.unique'=>'DNI repetido',
            'dni.numeric'=>'El DNI debe ser solo numeros',
            'nombres.max'=>'Maximo 20 carateres para los nombres',
            'apellidos.max'=>'Maximo 20 carateres para los apellidos',
            'edad.max'=>'Maximo 2 carateres para la edad',
            'direccion.max'=>'Maximo 40 carateres para la dirección',
            'telefono.max'=>'Maximo 9 carateres para el teléfono',
            'sexo.max'=>'Maximo 10 carateres para el sexo',
            'tipo.max'=>'Maximo 20 carateres para el tipo',
            'tipocliente.max'=>'Maximo 20 carateres para el tipocliente',
            
        ]);
        $alumno=Alumno::findOrFail($id);
        $alumno->dni=$request->dni;
        $alumno->nombres=$request->nombres;
        $alumno->apellidos=$request->apellidos;
        $alumno->edad=$request->edad;
        $alumno->direccion=$request->direccion;
        $alumno->telefono=$request->telefono;
        $alumno->sexo=$request->sexo;
        $alumno->tipo=$request->tipo;
        $alumno->tipocliente=$request->tipocliente;
        $alumno->save();
        return redirect()->route('alumno.index')->with('datos','Registro Actualizado ...!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $alumno=Alumno::findOrFail($id);
        return view('alumno.edit',compact('alumno'));
    }

    public function confirmar($id){
        $alumno=Alumno::findOrFail($id);
        return view('alumno.confirmar',compact('alumno'));
    }
    public function destroy($id)
    {
        $alumno=Alumno::findOrFail($id);
        $alumno->estado='0';
        $alumno->save();
        return redirect()->route('alumno.index')->with('datos','Registro Eliminado ...!');
    }
}
