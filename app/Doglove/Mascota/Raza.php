<?php
/**
 * Created by PhpStorm.
 * User: stephan
 * Date: 21/10/15
 * Time: 11:29 AM
 */


namespace App\Doglove\Mascota;

use Illuminate\Database\Eloquent\Model;


class Raza extends Model{

    protected $table="raza";
    protected $fillable=['nombre','descripcion'];
    public $timestamps = false;

} 