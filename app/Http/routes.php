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


use App\Doglove\Mascota\Dto;
use App\Doglove\Mascota\MascotaRepo;
use App\Doglove\Mascota\Raza;
use App\Doglove\Mascota\WebServices;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Modelos\Usuario;

use App\Modelos\Veterinaria;
use App\Modelos\Match;



Route::get('webservice1', function(Request $request) {

    $cad1=$request->input('cad1');
    $cad2=$request->input('cad2');
    $cad1='ad';
    $cad2='asasdfasdfasd';
    $webservices=new WebServices();

    $respuesta= $webservices->cadenaMayor($cad1,$cad2);

    return response()->json(['msgStatus'=>'ok','msgError'=>$respuesta]);

});











Route::get('oop', function() {

    $repo=new MascotaRepo();
    return $repo->getAll();

});

Route::get('oop', function() {

    $repo=new MascotaRepo();
    return $repo->getAll();

});
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
   
   $id_raza=Raza::where('nombre',$raza)->first()->id;

   $mascotasFiltradas=Mascota::whereNotIn('genero',array($genero))->where('id_raza',$id_raza)->get();
   return $mascotasFiltradas;
    
});

Route::get('like2',function(){
        
         $match=Match::find(array(1,2));
         return $match->first();

    });

Route::post('like',function(Request $request){
    
    
     
    //mascota actual
   $id_mascota1=$request->input('id_mascota1');
   //mascota a la cual se le hace like
   $id_mascota2=$request->input('id_mascota2');
   
   
    $existeInteres=Match::where('id_mascota1',$id_mascota2)->where('id_mascota2',$id_mascota1)->first();
    if($existeInteres){
        $pk1=$existeInteres->id;
        
        $match=Match::find($pk1);
        $match->match=1;
        $match->save();
        return "Ocurrió un match";
    }else{
        Match::create(array(
       'id_mascota1'=>$id_mascota1,
       'id_mascota2'=>$id_mascota2));
    }
    
    
    $nombre1=Mascota::find($id_mascota1)->nombre;
    $nombre2=Mascota::find($id_mascota2)->nombre;
    return "A ".$nombre1." le gusta ". $nombre2;
    
});

Route::post('dislike',function(Request $request){
    
    
     
    //mascota actual
   $id_mascota1=$request->input('id_mascota1');
   //mascota a la cual se le hace like
   $id_mascota2=$request->input('id_mascota2');
   
   
  Match::create(array(
       'id_mascota1'=>$id_mascota1,
       'id_mascota2'=>$id_mascota2,
       'match'=>0));

    $nombre1=Mascota::find($id_mascota1)->nombre;
    $nombre2=Mascota::find($id_mascota2)->nombre;
    return "A ".$nombre1." no le gusta ". $nombre2;
    
    
});

Route::post('posiblesMascotas', function (Request $request) {
    $id_mascota1= $request->input('id_mascota1');
    $genero=$request->input('genero');
    $raza= $request->input('raza');
    
    $id_raza=Raza::where('nombre',$raza)->first()->id;
    

    //devolver todos valores donde el campo match sea igual a 0
    
    $bloqueados= Match::where('id_mascota1',$id_mascota1)->whereOr('match',array(0,1))->get()->pluck('id_mascota2');
    
    //bloquar a la mascota misma
    
    $bloqueados=$bloqueados->push($id_mascota1);
    
    //mostrar todas las mascotas excepto aquellas que en la tabla match no esten bloquedas
    $mascotasFiltradas= Mascota::whereNotIn('genero',array($genero))->where('id_raza',$id_raza)->whereNotIn('id',$bloqueados)->get();
    
    return $mascotasFiltradas->pluck('nombre','id');
   
});

Route::get('match', function (Request $request) {
        return Match::all();
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

Route::get('mascotas', function (Request $request) {
    
    return Mascota::all(); 

   
});









Route::get('mascotas/{id}', function ($id) {
    $mascotas= Mascota::where('id_usuario',$id)->first();
    return $mascotas->nombre;

});

// Route::get('ejemplo', function () {

// 	return View('ejemplo');
// });


