<?php

namespace App\Models;
use App\Models\Dia;
use App\Models\Matricula;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $table = 'horarios';
    protected $primaryKey = 'idhorario';
    public $timestamps=false;
    protected $fillable = ['descripcion','iddia','estado'];
    public function dia(){
        return $this->hasOne(Dia::class,'iddia','iddia');
    }
    public function matricula(){
        return $this->hasOne(Matricula::class,'idmatricula','idmatricula');
    }
    public function programaciones(){
        return $this->hasOne(Programaciones::class,'idprogramacion','idprogramacion');
    }
}
