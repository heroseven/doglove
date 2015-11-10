<?php

use Illuminate\Database\Seeder;
use App\Modelos\Mascota;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Mascota::create(array(
           'nombre'=> 'Firilays',
           'id_raza'=>1,
           'genero'=>1,
            'id_usuario'=>1,
           'fecha_nacimiento'=>'2012-07-08 11:14:15'
       ));
       
       
       Mascota::create(array(
           'nombre'=> 'Samy',
           'id_raza'=>1,
           'genero'=>0,
            'id_usuario'=>2,
           'fecha_nacimiento'=>'2012-07-08 11:14:15'
       ));
       
       
       
       Mascota::create(array(
           'nombre'=> 'Sama',
           'id_raza'=>1,
           'genero'=>0,
            'id_usuario'=>2,
           'fecha_nacimiento'=>'2012-07-08 11:14:15'
       ));

    }
}
