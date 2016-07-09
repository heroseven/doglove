<?php

namespace App\Modelos2;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table="pedido";
    protected $fillable=['id_usuario','id_producto','cantidad','stock'];

    public $timestamps = false;
}
