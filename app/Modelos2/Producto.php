<?php
/**
 * Created by PhpStorm.
 * User: stephan
 * Date: 21/10/15
 * Time: 02:08 PM
 */

namespace App\Modelos2;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model {

        protected  $table="producto";
        protected $fillable=['nombre', 'descripcion','precio','stock'];




} 