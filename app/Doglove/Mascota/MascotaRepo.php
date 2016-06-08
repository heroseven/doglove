<?php
/**
 * Created by PhpStorm.
 * User: stephan
 * Date: 31/12/15
 * Time: 04:06 PM
 */

namespace App\Doglove\Mascota;


class MascotaRepo extends BaseRepo implements MascotaRepoInterface
{


    function getModel()
    {
        return new Mascota();
    }
}