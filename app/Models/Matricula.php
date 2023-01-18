<?php

namespace App\Models;
use App\Models\Alumno;
use App\Models\Programaciones;
use App\Models\Descuento;
use App\Models\Monto;
use App\Models\Periodo;
use App\Models\Pago;
use App\Models\Delegacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    protected $table='matriculas';
    protected $primaryKey='idmatricula';
    public $timestamps=false;
    protected $fillable=['fecha','hora','idalumno','idprogramacion','iddescuento',
    'idmonto','montotal','estado','idpago','idperiodo'];
    public function alumno(){
        return $this->hasOne(Alumno::class,'idalumno','idalumno');
    }
    public function delegacion(){
        return $this->hasOne(Delegacion::class,'iddelegacion','iddelegacion');
    }
    public function programacion(){
        return $this->hasOne(Programaciones::class,'idprogramacion','idprogramacion');
    }
    public function descuento(){
        return $this->hasOne(Descuento::class,'iddescuento','iddescuento');
    }
    public function monto(){
        return $this->hasOne(Monto::class,'idmonto','idmonto');
    }
    public function pago(){
        return $this->hasOne(Pago::class,'idpago','idpago');
    }
    public function periodo(){
        return $this->hasOne(Periodo::class,'idperiodo','idperiodo');
    }
}
