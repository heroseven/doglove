<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Modelos2\Pedido;
use App\Modelos2\Producto;
use App\Modelos2\DetallePedido;
use App\Modelos2\Usuarios;
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

    protected $arreglo1= array();
    protected $arreglo2= array();
    public function __construct($arreglo1, $arreglo2)
    {
        $this->arreglo1=$arreglo1;
        $this->arreglo2=$arreglo2;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
     
     
        $arreglo1=$this->arreglo1;
        $arreglo2=$this->arreglo2;
        
        $i=0;
        foreach($arreglo1 as $ite){
        
   
        DetallePedido::create(array(
            'id_usuario'=>1,
            'id_producto'=>$arreglo1[$i],
            'cantidad'=>$arreglo2[$i]));
        }
        return 'ok';
     
     
        
        /*$pedido=Pedido::create(array(
        'cantidad'=>$this->datos[0],
        'id_usuario'=>$this->datos[1],
        'id_producto'=>$this->datos[2]
        ));
        
        
        $producto=Producto::findOrFail($this->datos[2]);
        $stock=$producto->stock;
        $diferencia=$stock-$this->datos[0];
        
        $producto->stock=$diferencia;
        $producto->save();
        return 'ok';*/
        

       
    }
}
