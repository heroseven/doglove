<?php
/**
 * Created by PhpStorm.
 * User: stephan
 * Date: 07/10/15
 * Time: 05:06 PM
 */

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model{

    protected $table="mascota";
    protected $fillable=['nombre','descripcion','genero','fecha_nacimiento','id_usuario','id_raza'];
    public $timestamps = false;
    public function usuario(){
        return $this->belongsTo('Usuario','id_usuario');
    }
    public function raza(){
        return $this->belongsTo('Raza', 'id_raza');
    }
    
    public function fotos(){
        return $this->hasMany('App\Modelos\Foto', 'id_usuario');
    }


} 