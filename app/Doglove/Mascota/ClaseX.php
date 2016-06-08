<?php
/**
 * Created by PhpStorm.
 * User: stephan
 * Date: 07/01/16
 * Time: 12:01 PM
 */

namespace App\Doglove\Mascota;


/**
 * Class ClaseX
 * @package App\Doglove\Mascota
 */
class ClaseX
{


    /**
     * ClaseX constructor.
     * @param MascotaRepoInterface $mascotaRepo
     */
    public function __construct(MascotaRepoInterface $mascotaRepo)
    {

        $this->mascotaRepo=$mascotaRepo;
    }
}