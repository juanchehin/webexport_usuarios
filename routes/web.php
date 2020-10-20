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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios', function () {
    return view('usuarios.index');
});

Route::resource('usuarios','App\Http\Controllers\UsuariosController');
// Route::post('/usuarios', '\App\Http\Controllers\UsuariosController@create');

/*
Route::get('/usuarios', '\App\Http\Controllers\UsuariosController@index');
Route::get('/usuarios/nuevo', '\App\Http\Controllers\UsuariosController@create');
Route::get('/usuarios/editar', '\App\Http\Controllers\UsuariosController@edit');*/
// Route::get('/usuarios/nuevo', '\App\Http\Controllers\UsuariosController@create');
