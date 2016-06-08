<?php

use Illuminate\Database\Seeder;
use App\Modelos\Veterinaria;
class VeterinariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Veterinaria::create(array(
            'nombre'=>'v1',
            'direccion'=>'Alcanfores 232',
            'telefono'=>'4345345',
            'logo'=>'string3453453'));
            
        Veterinaria::create(array(
            'nombre'=>'v2',
            'direccion'=>'Méxio 332',
            'telefono'=>'43435345',
            'logo'=>'string2253453'));
    
        Veterinaria::create(array(
            'nombre'=>'v3',
            'direccion'=>'Palermo 332',
            'telefono'=>'43435345',
            'logo'=>'string2253453'));
    
    }
}
