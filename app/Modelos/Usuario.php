<?php

namespace App\Modelos;
use App\Modelos\Mascota;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='usuario';

    protected $fillable=['nombre','apellidop','apellidom','email'];


    public function mascotas(){
        return $this->hasMany('App\Modelos2\Pedido','id_usuario');
    }
}
