<?php

namespace App\Models;

use App\Models\Matricula;
use App\Models\MatriculaDelegacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegacion extends Model
{
    use HasFactory;
    protected $table='delegaciones';
    protected $primaryKey='iddelegacion';
    public $timestamps=false;
    protected $fillable=['ruc','razonsocial','direccion','tipocliente','estado'];
    
    public function matricula(){
        return $this->hasOne(Matricula::class,'idmatricula','idmatricula');
    }
    public function matriculadelegacion(){
        return $this->hasOne(MatriculaDelegacion::class,'idmatriculadelg','idmatriculadelg');
    }
    
}
