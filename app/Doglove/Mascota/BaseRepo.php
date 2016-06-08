<?php

/**
 * Created by PhpStorm.
 * User: stephan
 * Date: 31/12/15
 * Time: 04:49 PM
 */
namespace App\Doglove\Mascota;
use \Illuminate\Database\Eloquent\Model;

abstract class BaseRepo extends Model
{


    abstract public function getModel();

    public function getAll()
    {
       return  $this->getModel()->all();
    }

    public function find($id)
    {
        return $this->getModel()->find($id);


    }

    /**
     * @param $id
     */

}