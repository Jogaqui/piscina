<?php

namespace App\Models;
use App\Models\Matricula;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'pagos';
    protected $primaryKey = 'idpago';
    public $timestamps=false;
    protected $fillable = ['pago','estado'];
    public function matricula(){
        return $this->hasMany(Matricula::class,'idmatricula','idmatricula');
    }
}
