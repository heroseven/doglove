<?php

namespace App\Modelos2;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table="detalle_pedido";
    protected $fillable=['id_usuario','id_producto','cantidad'];
    public $timestamps = false;
}
