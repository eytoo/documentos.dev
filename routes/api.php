<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
return $request->user();
});*/

//Usuario
Route::post('/login', 'Api\UserController@login');
Route::post('/login/facebook', 'Api\UserController@loginFacebook');
Route::post('/register', 'Api\UserController@register');

//Conductor
Route::post('/loginDriver', 'Api\UserController@loginDriver');
Route::post('/usuario/actualizar', 'Api\UserController@actualizarUsuario');
Route::get('/usuario', 'Api\UserController@getUsuario');
Route::get('/usuario/buscar/{id}', 'Api\UserController@buscarUsuario');
Route::get('/usuario/email/{email}', 'Api\UserController@enviarEmail');
Route::get('/usuario/tarjetas/{id}', 'Api\UserController@getTarjetas');
Route::post('/usuario/tarjeta/crear', 'Api\UserController@crearTarjeta');
Route::post('/usuario/fcm/{id}/{token}', 'Api\UserController@fcmToken');
Route::post('/usuario/tarjeta/cambiar/{id}/{tarjeta}', 'Api\UserController@cambiarTarjeta');
Route::get('/usuario/cupones/{id}', 'Api\UserController@cuponesListar');

Route::post('/conductor/registro', 'Api\ConductorController@register');
Route::post('/conductor/login/facebook', 'Api\ConductorController@loginFacebook');
Route::get('/conductor/buscar/{id}', 'Api\ConductorController@getBuscar');
Route::post('/conductor/puntuar/{id}/{iduser}/{puntos}', 'Api\ConductorController@puntuarConductor');

//Carreras
Route::post('/carrera/crear', 'Api\CarreraController@crearCarrera');
Route::get('/carrera/buscar/{id}', 'Api\CarreraController@buscarCarrera');
Route::get('/carrera/actualizar/estado/{id}/{nest}', 'Api\CarreraController@EstadosCarrera');
Route::post('/carrera/confirmar/{id}', 'Api\CarreraController@confirmarCarrera');
Route::get('/carrera/actualizar/monto/{id}/{nmonto}', 'Api\CarreraController@MontoCarrera');
Route::get('/carrera/usuario/buscar/{id}', 'Api\CarreraController@buscarCarreraUsuario');

Route::get('/carrera/cambiarpago/{id}', 'Api\CarreraController@cambiarTipoPago');
Route::get('/carrera/terminada/detalles/{id}', 'Api\CarreraController@detalleCarreraTerminada');
Route::get('/carrera/historial/cliente/{id}', 'Api\CarreraController@carreraHistorialCliente');
Route::get('/carrera/historial/conductor/{id}', 'Api\CarreraController@carreraHistorialConductor');
Route::get('/carrera/reporte/inicial/{id}', 'Api\CarreraController@reporteInicial');
//Route::get('/carrera/cobrar/{id}', 'Api\CarreraController@getRealizarCobro');



Route::get("log/all", function () {
    return App\Log::all();
});
