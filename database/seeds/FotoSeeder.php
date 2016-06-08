<?php

use Illuminate\Database\Seeder;
use App\Modelos\Foto;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Foto::create(array(
            'foto'=>'asdaa',
            'id_usuario'=>1));
        
         Foto::create(array(
            'foto'=>'asdaa2',
            'id_usuario'=>1));
            
         Foto::create(array(
            'foto'=>'asdaa3',
            'id_usuario'=>1));
            
        
    }
}
