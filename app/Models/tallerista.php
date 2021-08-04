<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tallerista extends Model
{
    protected $table='tallerista';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['id','nombre_tallerista','lugar','lista_asignada','encuesta_realizada'];
}
