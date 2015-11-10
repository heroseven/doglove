<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Modelos\Usuario;
use App\Modelos\Mascota;
use App\Modelos\Raza;
use App\Modelos\Veterinaria;


Route::get('/test', function () {
    $usuario=Usuario::with('mascotas')->where('id',1)->get();
    return $usuario->with('mascotas')->get();

});

Route::get('/test2', function () {
    $usuario=Usuario::with('mascotas')->where('id',1)->get();

    return $usuario->with('mascotas')->get(); 
});





Route::get('/', function () {

    return View('welcome');
});

Route::post('login2', function (Request $request) {

	$data=$request->input('usuario');
	$usuario=Usuario::where('nombre',$data)->first();



	if($usuario){
		return response()->json(['msgStatus'=>'OK','msgError'=>'','usuario'=>$usuario,'']);
	}else{
		return response()->json(['msgStatus'=>'ERROR','msgError'=>'','usuario'=>'']);
	}

});


Route::get('razas',function(){
   
   $razas= Raza::all();
   return $razas;
});


Route::post('mascotas',function(Request $request){
   $genero=$request->input('genero');
   $raza=$request->input('raza');
   
   $id_raza=Raza::where('id',$raza)->first()->id;
   $mascotasFiltradas=Mascota::whereNotIn('genero',array($genero))->where('id_raza',$id_raza)->get();
   return $mascotasFiltradas;
    
});




Route::post('mascota', function (Request $request) {
	$id_mascota=$request->input('id_mascota');
	return Mascota::with('fotos')->where('id',$id_mascota)->first();
});


Route::post('registrar',function(Request $request){

    $nombre=$request->input('nombre');
    $genero=$request->input('genero');
    $fecha=$request->input('fecha_nacimiento');
    $id_usuario=$request->input('id_usuario');
    $raza= $request->input('id_raza');


    $id_raza=Raza::where('nombre',$raza)->first()->id;

    $mascota=Mascota::create(array(
       'nombre'=>$nombre,
        'genero'=>$genero,
        'fecha_nacimiento'=>$fecha,
        'id_usuario'=>$id_usuario,
        'id_raza'=>$id_raza
    ));

    return response()->json(['msgStatus'=>'OK','msgError'=>'']);
});


Route::get('veterinarias',function(){
   
   $veterinarias= Veterinaria::all();
   
   return response()->json(['msgStatus'=>'ERROR','msgError'=>'ERROR','veterinarias'=>$veterinarias]);
  
});


Route::post('login',function(Request $request){

    $nombre=$request->input('nombre');
    $apellidop=$request->input('apellidop');
    $apellidom=$request->input('apellidom');
    $email=$request->input('email');

//    $nombre="andrew4";$apellidom="a";$apellidop="a";$email="a";
    $usuario_existe=Usuario::where('nombre',$nombre)->first();

    if($usuario_existe){
        $usuario_existe=$usuario_existe->id;
        $usuario=Usuario::with('mascotas')->where('id',$usuario_existe)->first();

        return response()->json(['msgStatus'=>'OK','msgError'=>'','usuario'=>$usuario]);

    }else{

        $registroUsuario=Usuario::create(array(
            'nombre'=> $nombre,
            'apellidop'=>$apellidop,
            'apellidom'=>$apellidom,
            'email'=> $email
        ));

        if($registroUsuario){

            $usuario=Usuario::with('mascotas')->where('id',$registroUsuario->id)->first();
            return response()->json(['msgStatus'=>'OK','msgError'=>'','usuario'=>$usuario]);

        }

    }

});


Route::post('login3', function (Request $request) {

    $nombre=$request->input('nombre');
    $apellidop=$request->input('apellidop');
    $apellidom=$request->input('apellidom');
    $email=$request->input('email');

    $usuario=Usuario::where('nombre',$nombre)->first();

    if($usuario){

        $mascotas= Mascota::where('id_usuario',$usuario->id)->get();
        return response()->json(['msgStatus'=>'OK','msgError'=>'','usuario'=>$usuario,'mascotas'=>$mascotas]);


    }else{

        $registroUsuario=Usuario::create(array(
            'nombre'=> $nombre,
            'appellidop'=>$apellidop,
            'apellidom'=>$apellidom,
            'email'=> $email
        ));
        if($registroUsuario){

            return response()->json(['msgStatus'=>'ERROR','msgError'=>'ERROR','usuario'=>$registroUsuario]);

        }

    }

});


Route::get('login4', function (Request $request) {

    $nombre='stephan'.str_random(2);
    $apellidop='vargas'.str_random(2);
    $apellidom='schebesta'.str_random(2);
    $email=str_random(2).'stephan@gmail.com';

    $usuario=Usuario::where('nombre',$nombre)->first();

    if($usuario){

        $mascotas= Mascota::where('id_usuario',$usuario->id)->get();
        return response()->json(['msgStatus'=>'OK','msgError'=>'','usuario'=>$usuario,'mascotas'=>$mascotas]);


    }else{

        $registroUsuario=Usuario::create(array(
            'nombre'=> $nombre,
            'appellidop'=>$apellidop,
            'apellidom'=>$apellidom,
            'email'=> $email
        ));
        if($registroUsuario){

            return response()->json(['msgStatus'=>'ERROR','msgError'=>'ERROR','usuario'=>$registroUsuario]);

        }

    }

});


//esta consulta post recibe el nombre, si existe  devuelve
Route::post('login5', function (Request $request) {

    $nombre=$request->input('nombre');
    $apellidop=$request->input('apellidop');
    $apellidom=$request->input('apellidom');
    $email=$request->input('email');

    $usuario=Usuario::where('nombre',$nombre)->first();

    if($usuario){

        $mascotas= Mascota::where('id_usuario',$usuario->id)->get();
        return response()->json(['msgStatus'=>'OK','msgError'=>'','usuario'=>$usuario,'mascotas'=>$mascotas]);


    }else{

        $registroUsuario=Usuario::create(array(
            'nombre'=> $nombre,
            'appellidop'=>$apellidop,
            'apellidom'=>$apellidom,
            'email'=> $email
        ));
        if($registroUsuario){

            return response()->json(['msgStatus'=>'ERROR','msgError'=>'ERROR','usuario'=>$registroUsuario]);

        }

    }

});


Route::get('usuarios', function (Request $request) {

    return Usuario::all();

});


Route::get('mascotas', function (Request $request) {


//    return Mascota::find(13)->has('usuario')->get();

    $usuario= Usuario::find(1)->with('mascotas')->get();

    session()->put('usuario',$usuario);
    return session()->get('usuario');
});

Route::get('mascotas/{id}', function ($id) {
    $mascotas= Mascota::where('id_usuario',$id)->get();
    return $mascotas;

});

// Route::get('ejemplo', function () {

// 	return View('ejemplo');
// });


