<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/cultos', 'CultoController@index')->name('cultos');
Route::post('/cultos/create', 'CultoController@create');
Route::post('/cultos/agregar_asistencia', 'CultoController@agregar_asistencia');
Route::get('/cultos/cargar_asistencia', 'CultoController@cargar_asistencia');
Route::get('/cultos/cargar_asistentes', 'CultoController@cargar_asistentes');
Route::post('/cultos/eliminar_asistencia', 'CultoController@eliminar_asistencia');
Route::post('/cultos/confirmar_asistencia', 'CultoController@confirmar_asistencia');

Route::get('/hermanos', 'HermanoController@index')->name('hermanos');
Route::post('/hermanos/create', 'HermanoController@create');

Route::get('/usuarios', 'UserController@index')->name('usuarios');
Route::post('/usuarios/create', 'UserController@create');
