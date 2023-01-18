<?php

namespace App\Models;
use App\Models\Matricula;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table='alumnos';
    protected $primaryKey='idalumno';
    public $timestamps=false;
    protected $fillable=['dni','nombres','apellidos','edad','direccion','telefono','sexo','tipo','tipocliente','estado'];
    public function matricula(){
        return $this->hasOne(Matricula::class,'idmatricula','idmatricula');
    }
}
