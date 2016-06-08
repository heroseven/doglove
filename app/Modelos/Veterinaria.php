<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Veterinaria extends Model
{
    protected $table="veterinaria";
    protected $fillable=['nombre','direccion','telefono','logo'];
}
