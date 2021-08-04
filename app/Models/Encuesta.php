<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table='encuesta';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['id_tallerista','id_lista','id_pregunta', 'id_respuesta'];
}
