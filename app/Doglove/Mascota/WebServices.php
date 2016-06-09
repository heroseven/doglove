<?php
/**
 * Created by PhpStorm.
 * User: stephan
 * Date: 08/06/16
 * Time: 05:56 PM
 */

namespace App\Doglove\Mascota;
use Illuminate\Database\Eloquent\Model;

class WebServices
{
    public function __construct()
    {
    }

    public function cadenaMayor($cad1,$cad2){
        $cant1 = strlen($cad1);
        $cant2 = strlen($cad2);

        $cadMayor = ($cant1>=$cant2)?$cad1:$cad2;

        return $cadMayor;
    }

}