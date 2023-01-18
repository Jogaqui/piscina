<?php

namespace App\Models;
use App\Models\Matricula;
use App\Models\MatriculaDelegacion;
use App\Models\Periodo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monto extends Model
{
    use HasFactory;
    protected $table = 'montos';
    protected $primaryKey = 'idmonto';
    public $timestamps=false;
    protected $fillable = ['descripcion','montomes','montoclase','fechainicio','fechafin','tipo','idperiodo','estado'];
    public function matricula(){
        return $this->hasOne(Matricula::class,'idmatricula','idmatricula');
    }
    public function matriculadelegacion(){
        return $this->hasOne(MatriculaDelegacion::class,'idmatriculadelg','idmatriculadelg');
    }
    public function periodo(){
        return $this->hasOne(Periodo::class,'idperiodo','idperiodo');
    }
}
