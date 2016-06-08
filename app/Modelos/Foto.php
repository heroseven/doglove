<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{

    protected $table="foto";
    protected $fillable=['foto','id_usuario'];

}
