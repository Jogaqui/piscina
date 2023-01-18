<?php

namespace App\Http\Controllers;

use App\Models\Delegacion;
use App\Models\Matricula;
use App\Models\MatriculaDelegacion;
use App\Models\Periodo;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function PDF()
    {
        $periodo=Periodo::where('estado','=','1');
        $matricula = matricula::join("periodos","matriculas.idperiodo","=","periodos.idperiodo")->where('periodos.estado','=','1') ->get();
        $pdf = \PDF::loadView('reportes.matricula',compact('matricula','periodo'));
        return $pdf->setPaper('a3','landscape')->stream('Matricula.pdf');
    }
    public function PDFD()
    {
        $periodo=Periodo::where('estado','=','1');
        $matricula = MatriculaDelegacion::join("periodos","matriculasdelegacion.idperiodo","=","periodos.idperiodo")->where('periodos.estado','=','1') ->get();
        $pdf = \PDF::loadView('reportes.matriculad',compact('matricula','periodo'));
        return $pdf->setPaper('a3','landscape')->stream('Matriculas Delegaciones.pdf');
    }
    public function PDFM()
    {
        $periodo=Periodo::where('estado','=','1');
        $matricula = matricula::join("periodos","matriculas.idperiodo","=","periodos.idperiodo")->where('periodos.estado','=','1') ->get();
        $pdf = \PDF::loadView('reportes.mmes',compact('matricula','periodo'));
        return $pdf->setPaper('a3','landscape')->stream('Matricula Por Mes.pdf');
    }
    public function PDFP()
    {
        $periodo=Periodo::where('estado','=','1');
        $matricula = matricula::join("periodos","matriculas.idperiodo","=","periodos.idperiodo")->where('periodos.estado','=','1') ->get();
        $pdf = \PDF::loadView('reportes.mpago',compact('matricula','periodo'));
        return $pdf->setPaper('a3','landscape')->stream('Matricula por modalidad de pago.pdf');
    }
    public function PDFDI()
    {
        $periodo=Periodo::where('estado','=','1');
        $matricula = matricula::join("periodos","matriculas.idperiodo","=","periodos.idperiodo")->where('periodos.estado','=','1') ->get();
        $pdf = \PDF::loadView('reportes.mdiario',compact('matricula','periodo'));
        return $pdf->setPaper('a3','landscape')->stream('Matricula diaria.pdf');
    }
}
