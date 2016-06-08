<?php
/**
 * Created by PhpStorm.
 * User: stephan
 * Date: 08/06/16
 * Time: 05:56 PM
 */

namespace Mascota;


class WebServices
{

    public function cadenaMayor($cad1,$cad2){
        $cant1 = $cad1.length();
        $cant2 = $cad2.length();

        $cadMayor = (cant1>=cant2)?Cad1:Cad2;

        return $cadMayor;
    }

}