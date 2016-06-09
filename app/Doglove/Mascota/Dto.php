<?php
/**
 * Created by PhpStorm.
 * User: stephan
 * Date: 08/06/16
 * Time: 06:28 PM
 */

namespace App\Doglove\Mascota;


class Dto
{
    private $msgStatus='';
    private $msgError='';

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getMsgStatus()
    {
        return $this->msgStatus;
    }

    /**
     * @param string $msgStatus
     */
    public function setMsgStatus($msgStatus)
    {
        $this->msgStatus = $msgStatus;
    }

    /**
     * @return string
     */
    public function getMsgError()
    {
        return $this->msgError;
    }

    /**
     * @param string $msgError
     */
    public function setMsgError($msgError)
    {
        $this->msgError = $msgError;
    }



}