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
use Illuminate\Http\Request;

Route::get('/', ["uses"=>"Ejemplo1Controller@inicio"]);

//Route::get('/', function () {
Route::get("puede/ser/cualquiera/cosa.php", function () {
    //return view('welcome');
      return "<b>Otra Cosa</b>";
});

Route::get("variable", function() {
	return config("app.ciudad");
});

Route::get("saluda/{nombre}/{apellido}", function($nombre, $apellido) {
	return "<b>Saludar  </b>".$nombre."  ".$apellido;
});

//Route::get("verificar/{id?}", function($id=0) {
//	return $id;
//})-> where ('id','[0-9]+');

Route::get("verificar/{id?}", function(Request $r, $id=0) {
	$pagina = $r->get('pagina');	
	return $pagina;
});

/*Route::get("ejercicio/{nombre}/{edad}", function(Request $r, $nombre, $edad) {

	$apodo = $r->get('apodo');
	if($apodo != "") 
	{
		return "Hola".$nombre." ".$apodo." - ".$edad."anos";
	}
	return "Chau".$nombre." - ".$edad."anos";

})-> where ('edad','[0-9]+');
*/

Route::get("ejercicio/{nombre}/{edad}", ["uses"=>"Reportes\Ejemplo2Controller@ejercicio"]);
//Route::get("entradas",["uses"=>"EntradaController@index"]);
//Route::get("/admin/entradas",["uses"=>"EntradaController@entradas"]);
//Route::get("/admin/entradas/{id}/editar",["uses"=>"EntradaController@modificar"]);
//Route::post("/admin/entradas/{id}/editar",["uses"=>"EntradaController@update"]);
//Route::put("/admin/entradas/{id}/editar",["uses"=>"EntradaController@update"]);
//Route::get("/admin/entradas/nuevo",["uses"=>"EntradaController@nuevo"]);
//Route::post("/admin/entradas/nuevo",["uses"=>"EntradaController@save"]);
//Route::delete("/admin/entradas/{id}",["uses"=>"EntradaController@destroy"]);

//Rutas para Users
//Route::get("/admin/usuarios",["uses"=>"UsuarioController@users"]); //Mostrar Vista de los Usuarios
//Route::get("/admin/usuarios/nuevo",["uses"=>"UsuarioController@nuevo"]); // Crear nuevo usuario
//Route::post("/admin/usuarios/nuevo",["uses"=>"UsuarioController@save"]); // Guardar nuevo usuario 
//Route::get("/admin/usuarios/{id}/editar",["uses"=>"UsuarioController@modificar"]); // Modificar usuario creado
//Route::put("/admin/usuarios/{id}/editar",["uses"=>"UsuarioController@update"]);
//Route::delete("/admin/usuarios/{id}",["uses"=>"UsuarioController@destroy"]); // Borrar usuario creado

//Authenticacion
Route::get("/login",["uses"=>"Auth\AuthController@login"]);
Route::post("auth/login",["uses"=>"Auth\AuthController@postlogin"]); // Guardar nuevo usuario
Route::get('auth/logout', ['uses' => 'Auth\AuthController@getLogout']); // Esta ruta usa el metodo getLogout que hereda AuthController para cerrar sesión

//Agrupando Rutas para no ingresar a ninguna vista una ves cerrado secion
Route::group(['middleware' => 'auth'], function() {
	Route::get("entradas",["uses"=>"EntradaController@index"]);
	Route::get('/admin/entradas', ['uses' => 'EntradaController@entradas']);
    Route::get('/admin/entradas/{id}/editar', ['uses' => 'EntradaController@modificar']);
    Route::post('/admin/entradas/{id}/editar', ['uses' => 'EntradaController@update']);
    Route::put("/admin/entradas/{id}/editar",["uses"=>"EntradaController@update"]);
	Route::get("/admin/entradas/nuevo",["uses"=>"EntradaController@nuevo"]);	
	Route::post("/admin/entradas/nuevo",["uses"=>"EntradaController@save"]);	
	Route::delete("/admin/entradas/{id}",["uses"=>"EntradaController@destroy"]);
	Route::get("/admin/usuarios",["uses"=>"UsuarioController@users"]); //Mostrar Vista de los Usuarios
	Route::get("/admin/usuarios/ajax",["uses"=>"UsuarioController@usersajax"]); //Manda informacion de BD de Usuarios Ajax
	Route::get("/admin/usuarios2",["uses"=>"UsuarioController@users2"]); //Mostrar Vista de los Usuarios Ajax
	Route::get("/admin/usuarios/nuevo",["uses"=>"UsuarioController@nuevo"]); // Crear nuevo usuario
	Route::post("/admin/usuarios/nuevo",["uses"=>"UsuarioController@save"]); // Guardar nuevo usuario 
	Route::get("/admin/usuarios/{id}/editar",["uses"=>"UsuarioController@modificar"]); // Modificar usuario creado
	Route::put("/admin/usuarios/{id}/editar",["uses"=>"UsuarioController@update"]);
	Route::delete("/admin/usuarios/{id}",["uses"=>"UsuarioController@destroy"]); // Borrar usuario creado
	Route::get('admin/categorias', ['uses' => 'CategoriaController@index']);
    Route::get('admin/categorias/nuevo', ['uses' => 'CategoriaController@create']);
    Route::post('admin/categorias/nuevo', ['uses' => 'CategoriaController@store']);
    Route::get('admin/categorias/{id}/editar', ['uses' => 'CategoriaController@edit']);
    Route::put('admin/categorias/{id}/editar', ['uses' => 'CategoriaController@update']);
    Route::delete('admin/categorias/{id}', ['uses' => 'CategoriaController@destroy']);
    Route::delete('admin/categoriasmig/{id}', ['uses' => 'CategoriaControllermig@destroy']);
});