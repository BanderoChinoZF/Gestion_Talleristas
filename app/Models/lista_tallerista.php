<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lista_tallerista extends Model
{
    protected $table='lista_tallerista';
    protected $primarykey='id_lista';
    public $timestamps=false;
    protected $fillable=['id_lista','id_tallerista','encuesta_realizada'];
}

