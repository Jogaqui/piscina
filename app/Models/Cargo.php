<?php

namespace App\Models;
use App\Models\Personal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $table = 'cargos';
    protected $primaryKey = 'idcargo';
    public $timestamps=false;
    protected $fillable = ['cargo','estado'];
    public function personal(){
        return $this->hasMany(Personal::class,'idpersonal','idpersonal');
    }
}
