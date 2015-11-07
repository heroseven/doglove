<?php

use Illuminate\Database\Seeder;
use App\Modelos\Raza;
class RazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Raza::create(array(
            'nombre'=>'bull terrier',

        ));
        Raza::create(array(
            'nombre'=>'bull dog',

        ));
        Raza::create(array(
            'nombre'=>'labrador',

        ));
    }
}
