<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMensaje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('mensaje', function(Blueprint $table){
          $table->increments('id');
          $table->integer('id_mascota1_match')->unsigned();
          $table->integer('id_mascota2_match')->unsigned();
          $table->string('autor');
          $table->string('mensaje');
          $table->foreign('id_mascota1_match')->references('id_mascota1')->on('match');
          $table->foreign('id_mascota2_match')->references('id_mascota2')->on('match');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mensaje');
    }
}
