<?php

namespace App\Models;
use App\Models\Matricula;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    use HasFactory;
    protected $table = 'descuentos';
    protected $primaryKey = 'iddescuento';
    public $timestamps=false;
    protected $fillable = ['descripcion','montod','estado','idperiodo'];
    public function matricula(){
        return $this->hasOne(Matricula::class,'idmatricula','idmatricula');
    }
    public function periodo(){
        return $this->hasOne(Periodo::class,'idperiodo','idperiodo');
    }
}
