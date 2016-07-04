<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Modelos2\Pedido;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class Send extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $datos;
    public function __construct($datos)
    {
        $this->datos=$datos;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $pedido=Pedido::create(array(
            'cantidad'=>$this->datos[0],
            'id_usuario'=>$this->datos[1],
            'id_producto'=>$this->datos[2]
        ));

        return 'ok';
    }
}
