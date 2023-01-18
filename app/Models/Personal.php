<?php

namespace App\Models;
use App\Models\Cargo;
use App\Models\Matricula;
use App\Models\Programaciones;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $table='personal';
    protected $primaryKey='idpersonal';
    public $timestamps=false;
    protected $fillable=['dni','nombres','apellidos','direccion','telefono','idcargo','estado'];
    public function cargo(){
        return $this->hasOne(Cargo::class,'idcargo','idcargo');
    }
    public function matricula(){
        return $this->hasOne(Matricula::class,'idmatricula','idmatricula');
    }
    public function programaciones(){
        return $this->hasOne(Programaciones::class,'idprogramacion','idprogramacion');
    }
}
