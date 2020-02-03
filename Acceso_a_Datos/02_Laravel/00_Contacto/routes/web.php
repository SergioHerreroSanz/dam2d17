<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/saludo', function(){
	return 'Hola';
});
Route::get('/despedida', function(){
	return 'Adiós';
});
Route::get('/suma/{a}/{b}', function($a,$b){
	return $a+$b;
});
Route::get('/saludo/{nombre}', function($nombre){
	return 'Hola '. $nombre;
});
Route::get('/despedida/{nombre}', function($nombre){
	return 'Adiós '. $nombre;
});
Route::get('/saludoControlador', 'MiControlador@f1');
Route::get('/despedidaControlador', 'MiControlador@f2');
Route::get('/saludoControlador/{nombre}', 'MiControlador@f1Param');
Route::get('/despedidaControlador/{nombre}', 'MiControlador@f2Param');
Route::get('/sumaControlador/{a}/{b}', 'MiControlador@f3Param');
