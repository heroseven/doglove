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
            $table->increments('id');
            $table->integer('id_mascota1')->unsigned();
            $table->integer('id_mascota2')->unsigned();
            $table->integer('match');

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
