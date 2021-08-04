<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
    protected $table='datos';
    protected $primarykey='id_empleado';
    public $timestamps=false;
    protected $fillable=['nombre_completo', 'ubicacion', 'departamento', 'jefe_inmediato', 'puesto', 'tipo'];
}
