<?php
/**
 * Created by PhpStorm.
 * User: stephan
 * Date: 21/10/15
 * Time: 01:53 PM
 */

namespace App\Modelos;


use Illuminate\Database\Eloquent\Model;
class Match extends Model {


    protected $table="match";
    protected $fillable=['id_mascota1','id_mascota2','match'];
    public $timestamps = false;
    public function mensajes(){
        return $this->hasMany('mensaje',['id_mascota1_match','id_mascota2_match']);
    }


} 