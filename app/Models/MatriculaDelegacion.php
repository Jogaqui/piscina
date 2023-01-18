<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Monto;
use App\Models\Periodo;
use App\Models\Delegacion;

class MatriculaDelegacion extends Model
{
    use HasFactory;
    protected $table='matriculasdelegacion';
    protected $primaryKey='idmatriculadelg';
    public $timestamps=false;
    protected $fillable=['fecha','hora','iddelegacion','idmonto','cantidad','montototal','observacion','estado','idperiodo'];
  
    public function delegacion(){
        return $this->hasOne(Delegacion::class,'iddelegacion','iddelegacion');
    }
    public function monto(){
        return $this->hasOne(Monto::class,'idmonto','idmonto');
    }
    public function periodo(){
        return $this->hasOne(Periodo::class,'idperiodo','idperiodo');
    }
}
