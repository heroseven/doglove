<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTableUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('email');
            $table->integer('estado');
            $table->string('password', 60);
            $table->rememberToken();

        });
    }

    /**
     * Reverse the migrations.$table->timestamps();
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
