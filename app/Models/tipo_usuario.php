<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_usuario extends Model
{
    protected $table='tipo_usuario';
    protected $primarykey='id_tipo';
    public $timestamps=false;
    protected $fillable=['id_tipo','nombre_usuario'];
}
