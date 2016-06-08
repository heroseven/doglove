<?php

use App\Doglove\Mascota\ClaseX;
use App\Doglove\Mascota\MascotaRepo;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {

        /*$mascota= new MascotaRepo();
        $mascota=$mascota->find(1)->nombre;
        $this->assertEquals('Firilays',$mascota,'adsfa');*/



        //verified_if_interfaces_work

        $clase=new ClaseX(new MascotaRepo());
        $firstName= $clase->mascotaRepo->find(1)->nombre;
        $this->assertEquals('Firilays',$firstName,'No coinciden');

    }



}
