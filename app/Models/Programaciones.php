<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Piscina;
use App\Models\Nivel;
use App\Models\Horario;
use App\Models\Personal;
use App\Models\Periodo;
use App\Models\Matricula;
use Illuminate\Support\Facades\DB;

class Programaciones extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='programaciones';
    protected $primaryKey='idprogramacion';
    public $timestamps=false;
    protected $fillable=['idpiscina','idnivel','idhorario','vacante','idpersonal','estado','idperiodo'];
    public function piscina(){
        return $this->hasOne(Piscina::class,'idpiscina','idpiscina');
    }
    public function nivel(){
        return $this->hasOne(Nivel::class,'idnivel','idnivel');
    }
    public function horario(){
        return $this->hasOne(Horario::class,'idhorario','idhorario');
    }
    public function personal(){
        return $this->hasOne(Personal::class,'idpersonal','idpersonal');
    }
    public function periodo(){
        return $this->hasOne(Periodo::class,'idperiodo','idperiodo');
    }
    public function matricula(){
        return $this->hasOne(Matricula::class,'idmatricula','idmatricula');
    }
    public static function ActualizarVacante($idprogramacion){
        return DB::select(
            DB::raw("UPDATE programaciones set vacante = vacante -1 where idprogramacion='".$idprogramacion."'")
        );
    }


}
