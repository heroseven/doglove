<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(RazaSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(MascotaSeeder::class);
        $this->call(VeterinariaSeeder::class);
        $this->call(FotoSeeder::class);
    

        Model::reguard();
    }
}
