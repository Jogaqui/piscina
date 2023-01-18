
<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DelegacionController;
use App\Http\Controllers\DescuentoController;
use App\Http\Controllers\DiaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\PiscinaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\AnularController;
use App\Http\Controllers\MatriculaDelgController;
use App\Http\Controllers\MontoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProgramacionesController;
use App\Http\Controllers\ReporteController;



Route::get('/',[UserController::class,'showLogin']);
Route::get('/dark',[UserController::class,'showLogin2']);
Route::post('/identificacion',[UserController::class,'verificalogin'])->name('identificacion');
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::post('/',[UserController::class,'salir'])->name('logout');

Route::get('/planti', function () {
    return view('layout.plantilla4');
});

Route::get('/3', function () {
    return view('layout.plantilla3');
});
/*Alumno*/
Route::resource('alumno',AlumnoController::class);
Route::get('alumno/{id}/confirmar',[AlumnoController::class,'confirmar'])->name('alumno.confirmar');
Route::get('cancelar',function(){
    return redirect()->route('alumno.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar');

/*Cargo*/
Route::resource('cargo',CargoController::class);
Route::get('cargo/{id}/confirmar',[CargoController::class,'confirmar'])->name('cargo.confirmar');
Route::get('cancelar1',function(){
    return redirect()->route('cargo.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar1');

/*Personal*/
Route::resource('personal',PersonalController::class);
Route::get('personal/{id}/confirmar',[PersonalController::class,'confirmar'])->name('personal.confirmar');
Route::get('cancelar2',function(){
    return redirect()->route('personal.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar2');

/*nivel*/
Route::resource('nivel',NivelController::class);
Route::get('nivel/{id}/confirmar',[NivelController::class,'confirmar'])->name('nivel.confirmar');
Route::get('cancelar3',function(){
    return redirect()->route('nivel.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar3');

/*Piscina*/
Route::resource('piscina',PiscinaController::class);
Route::get('piscina/{id}/confirmar',[PiscinaController::class,'confirmar'])->name('piscina.confirmar');
Route::get('cancelar4',function(){
    return redirect()->route('piscina.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar4');


/*Horario*/
Route::resource('horario',HorarioController::class);
Route::get('horario/{id}/confirmar',[HorarioController::class,'confirmar'])->name('horario.confirmar');
Route::get('cancelar5',function(){
    return redirect()->route('horario.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar5');

/*Dia*/
Route::resource('dia',DiaController::class);
Route::get('dia/{id}/confirmar',[DiaController::class,'confirmar'])->name('dia.confirmar');
Route::get('cancelar6',function(){
    return redirect()->route('dia.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar6');

/*Matricula*/
Route::resource('matricula',MatriculaController::class);
Route::get('cancelar7',function(){
    return redirect()->route('matricula.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar7');

/*Anular Matricula*/
Route::resource('anular',AnularController::class);
Route::get('anular/{id}/confirmar',[AnularController::class,'confirmar'])->name('anular.confirmar');
Route::get('cancelar14',function(){
    return redirect()->route('anular.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar14');

/*periodo*/
Route::resource('periodo',PeriodoController::class);
Route::get('periodo/{id}/confirmar',[PeriodoController::class,'confirmar'])->name('periodo.confirmar');
Route::get('cancelar8',function(){
    return redirect()->route('periodo.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar8');

/*Descuento*/
Route::resource('descuento',DescuentoController::class);
Route::get('descuento/{id}/confirmar',[DescuentoController::class,'confirmar'])->name('descuento.confirmar');
Route::get('cancelar9',function(){
    return redirect()->route('descuento.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar9');

/*MONTO*/
Route::resource('monto',MontoController::class);
Route::get('monto/{id}/confirmar',[MontoController::class,'confirmar'])->name('monto.confirmar');
Route::get('cancelar10',function(){
    return redirect()->route('monto.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar10');

/*PROGRAMACIONES*/
Route::resource('programaciones',ProgramacionesController::class);
Route::get('programaciones/{id}/confirmar',[ProgramacionesController::class,'confirmar'])->name('programaciones.confirmar');
Route::get('cancelar11',function(){
    return redirect()->route('programaciones.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar11');

/*DELEGACION*/
Route::resource('delegacion',DelegacionController::class);
Route::get('delegacion/{id}/confirmar',[DelegacionController::class,'confirmar'])->name('delegacion.confirmar');
Route::get('cancelar12',function(){
    return redirect()->route('delegacion.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar12');

/*Matricula delegacion*/
Route::resource('matriculadelg',MatriculaDelgController::class);
Route::get('cancelar13',function(){
    return redirect()->route('matriculadelg.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar13');

/*Pago*/
Route::resource('pago',PagoController::class);
Route::get('pago/{id}/confirmar',[PagoController::class,'confirmar'])->name('pago.confirmar');
Route::get('cancelar14',function(){
    return redirect()->route('pago.index')->with('datos','Acción Cancelada ...!');
})->name('cancelar14');

/*REPORTES*/
route::get('/pdf',[ReporteController::class,'PDF'])->name('descargarPDF');
route::get('/pdfD',[ReporteController::class,'PDFD'])->name('descargarPDFD');
route::get('/pdfMES',[ReporteController::class,'PDFM'])->name('descargarPDFM');
route::get('/pdfPAGO',[ReporteController::class,'PDFP'])->name('descargarPDFP');
route::get('/pdfDiario',[ReporteController::class,'PDFDI'])->name('descargarPDFDI');

Route::get('/EncontrarProgramacion/{idprogramacion}',[MatriculaController::class,'ProgramacionCodigo']);