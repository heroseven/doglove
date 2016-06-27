<?php

namespace App\Modelos2;


use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table='usuarios';

    protected $fillable=['nombre','email','password'];


    public function pedidos(){
        return $this->hasMany('App\Modelos\Mascota','id_usuario');
    }
}
