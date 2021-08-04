<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class respuesta extends Model
{
    protected $table='respuesta';
    protected $primarykey='id_pregunta';
    public $timestamps=false;
    protected $fillable=['id_pregunta','id_tallerista','numero_respuesta','valor_respuesta'];
}
