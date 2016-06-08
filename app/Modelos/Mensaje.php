<?php
/**
 * Created by PhpStorm.
 * User: stephan
 * Date: 21/10/15
 * Time: 02:08 PM
 */

namespace App\Modelos;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model {

        protected  $table="mensaje";
        protected $fillable=['id_mascota1_match','id_mascota2_match','autor','mensaje'];




} 