<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piscina extends Model
{
    use HasFactory;
    protected $table = 'piscinas';
    protected $primaryKey = 'idpiscina';
    public $timestamps=false;
    protected $fillable = ['descripcion','estado'];

    public function programaciones(){
        return $this->hasOne(Programaciones::class,'idprogramacion','idprogramacion');
    }
}
