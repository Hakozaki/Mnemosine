<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */

Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home.index']);
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home.index']);

Route::get('/magia', ['uses' => 'MagiaController@index', 'as' => 'magia.index']);
Route::get('/magia/detalhe/{magia?}', ['uses' => 'MagiaController@detalhe', 'as' => 'magia.detalhe']);
Route::get('/magia/deletar/{magia?}', ['uses' => 'MagiaController@deletar', 'as' => 'magia.deletar']);
Route::post('/magia/salvar', ['uses' => 'MagiaController@salvar', 'as' => 'magia.salvar']);


Route::get('eoq', function (\App\Magia $magia) {    
    dd($magia->escolas());
    foreach ($magia->escolas() as $value) {
      dump($value);
    }
});

Auth::routes();

