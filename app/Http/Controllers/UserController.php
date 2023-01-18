<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showlogin2(){
        return view('login-dark');
    }
    public function showlogin(){
        $periodo = periodo::where('periodo')->get();
        return view('login',compact('periodo'));
    }
    public function verificalogin(Request $request){
        // return dd($request->all());
        $data=request()->validate([
         'name'=>'required',
         'password'=>'required'
        ],
        [
         'name.required'=>'Ingrese usuario',
         'password.required'=>'Ingrese contrasena',
        ]);
 
        if (Auth::attempt($data))
        {
          $con='OK';
        }
       $name=$request->get('name');
        $query= User::where('name','=',$name)->get();
        if ($query->count()!=0)
        {
         $hashp=$query[0]->password;
         $password=$request->get('password');
         if(password_verify($password,$hashp)){
             return redirect()->route('home');
         }else{
             return back()->withErrors(['password'=>'Contrasena no valida'])
             ->withInput(request(['name','password']));
         }
        }
        else{
         return back()->withErrors(['name'=>'Usuario no valido'])
         ->withInput(request(['name']));
        }
       
    }
    public function salir(){
        Auth::logout();
        return redirect('/');
    }
}
