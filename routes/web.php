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

Route::get('/talento', ['uses' => 'TalentoController@index', 'as' => 'talento.index']);
Route::get('/talento/detalhe/{talento?}', ['uses' => 'TalentoController@detalhe', 'as' => 'talento.detalhe']);
Route::get('/talento/deletar/{talento?}', ['uses' => 'TalentoController@deletar', 'as' => 'talento.deletar']);
Route::post('/talento/salvar', ['uses' => 'TalentoController@salvar', 'as' => 'talento.salvar']);

Route::get('/arma', ['uses' => 'ArmaController@index', 'as' => 'arma.index']);
Route::get('/arma/detalhe/{arma?}', ['uses' => 'ArmaController@detalhe', 'as' => 'arma.detalhe']);
Route::get('/arma/deletar/{arma?}', ['uses' => 'ArmaController@deletar', 'as' => 'arma.deletar']);
Route::post('/arma/salvar', ['uses' => 'ArmaController@salvar', 'as' => 'arma.salvar']);

Route::get('/armadura', ['uses' => 'ArmaduraController@index', 'as' => 'armadura.index']);
Route::get('/armadura/detalhe/{armadura?}', ['uses' => 'ArmaduraController@detalhe', 'as' => 'armadura.detalhe']);
Route::get('/armadura/deletar/{armadura?}', ['uses' => 'ArmaduraController@deletar', 'as' => 'armadura.deletar']);
Route::post('/armadura/salvar', ['uses' => 'ArmaduraController@salvar', 'as' => 'armadura.salvar']);

Auth::routes();

