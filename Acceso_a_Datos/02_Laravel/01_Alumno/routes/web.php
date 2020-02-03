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
Route::get('/', function(){return redirect(route("alumnos_index"));});
Route::get('/alumnos', 'AlumnoController@index') -> name ('alumnos_index');
Route::get('/alumnos/create', 'AlumnoController@create') -> name ('alumnos_create');
Route::post('/alumnos', 'AlumnoController@store') -> name('alumnos_store');
Route::get('/alumnos/{id}', 'AlumnoController@show') -> name('alumnos_show');
Route::get('/alumnos/{id}/edit', 'AlumnoController@edit') -> name('alumnos_edit');
Route::put('/alumnos/{id}', 'AlumnoController@update') -> name('alumnos_update');
Route::delete('/alumnos/{id}', 'AlumnoController@destroy') -> name('alumnos_destroy');


