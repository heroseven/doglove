<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaVeterinaria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veterinaria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
            $table->binary('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('veterinaria');
    }
}
