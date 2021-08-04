<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lista extends Model
{
    protected $table='lista';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['id','id_usuario_creado','fecha_creacion','imagen_lista','comentario_lista','lista_completada'];
}
