<?php

namespace App\Models;
use App\Models\Matricula;
use App\Models\MatriculaDelegacion;
use App\Models\Monto;
use App\Models\Descuento;
use App\Models\Programaciones;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    protected $table = 'periodos';
    protected $primaryKey = 'idperiodo';
    public $timestamps=false;
    protected $fillable = ['periodo','estado'];
    public function matricula(){
        return $this->hasOne(Matricula::class,'idmatricula','idmatricula');
    }
    public function matriculadelegacion(){
        return $this->hasOne(MatriculaDelegacion::class,'idmatriculadelg','idmatriculadelg');
    }
    public function descuento(){
        return $this->hasOne(Descuento::class,'iddescuento','iddescuento');
    }
    public function programaciones(){
        return $this->hasOne(Programaciones::class,'idprogramacion','idprogramacion');
    }
    public function monto(){
        return $this->hasOne(Monto::class,'idmonto','idmonto');
    }
}
