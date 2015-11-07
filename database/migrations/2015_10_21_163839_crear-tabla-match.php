<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('match', function(Blueprint $table){
            $table->integer('id_mascota1')->unsigned();
            $table->integer('id_mascota2')->unsigned();
            $table->primary(['id_mascota1','id_mascota2']);
            $table->integer('match');
            $table->foreign('id_mascota1')->references('id')->on('usuario');
            $table->foreign('id_mascota2')->references('id')->on('usuario');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('match');
    }
}
