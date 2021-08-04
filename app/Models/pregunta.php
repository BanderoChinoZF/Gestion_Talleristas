<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pregunta extends Model
{
    protected $table='pregunta';
    protected $primarykey='id_pregunta';
    public $timestamps=false;
    protected $fillable=['id_pregunta','nombre_pregunta'];
}
