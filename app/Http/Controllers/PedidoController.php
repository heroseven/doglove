<?php

namespace App\Http\Controllers;

use App\Jobs\Send;
use App\Modelos2\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Modelos2\Producto;
use Illuminate\Support\Facades\Log;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Producto::all();
        
    }
    public function cola(){
//        $datos=[1,1,1];
//        $job= (new Send($daos))->delay(2);
//        Log::info("Request Cycle with Queues Begins");
//        $this->dispatch($job);
//
//        return 'exito';

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Como recuperar el error en consola al usar la linea de abajo?
        //Pedido::create($request->all());

        $cantidad=$request->input('cantidad');
        $id_usuario=$request->input('usuario');
        $id_usuario=1;
        $id_producto=$request->input('id');

        $datos=[$cantidad,$id_usuario,$id_producto];
        $job= (new Send($datos))->delay(15);
       
        dispatch($job);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        Producto::findOrFail($id);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
         Producto::findOrFail($id)->update($request->all());
         return Response::json($request->all());
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Producto::destroy($id);
    }
}
