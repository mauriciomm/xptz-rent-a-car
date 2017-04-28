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

Route::resource('cliente', 'ClienteController');
Route::resource('carro', 'CarroController');
Route::resource('locacao', 'LocacaoController');
Route::post('/locacao/buscaclientes', 'LocacaoController@buscaclientes');
Route::post('/locacao/buscavalor', 'LocacaoController@buscavalor');