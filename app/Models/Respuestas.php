<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    protected $table='respuesta';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['valor_respuesta'];
}
