<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;



class LoginController extends Controller
{
    public function PDF()
    {
        $periodo=Periodo::where('estado','=','1');
        return view('login',compact('buscarpor','periodo','descuento'));
    }
}
