<?php

use Illuminate\Database\Seeder;
use App\Modelos\Usuario;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Usuario::create(array(
           'nombre'=>'tomy',
           'email'=>'tomy@gmail.com'
       ));
    }
}
