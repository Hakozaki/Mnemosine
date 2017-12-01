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
Route::post('/home/salvar', ['uses' => 'HomeController@salvar', 'as' => 'home.salvar']);


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

Route::get('/classe', ['uses' => 'ClasseController@index', 'as' => 'classe.index']);
Route::get('/classe/detalhe/{classe?}', ['uses' => 'ClasseController@detalhe', 'as' => 'classe.detalhe']);
Route::get('/classe/deletar/{classe?}', ['uses' => 'ClasseController@deletar', 'as' => 'classe.deletar']);
Route::post('/classe/salvar', ['uses' => 'ClasseController@salvar', 'as' => 'classe.salvar']);

Route::get('/divindade', ['uses' => 'DivindadeController@index', 'as' => 'divindade.index']);
Route::get('/divindade/detalhe/{divindade?}', ['uses' => 'DivindadeController@detalhe', 'as' => 'divindade.detalhe']);
Route::get('/divindade/deletar/{divindade?}', ['uses' => 'DivindadeController@deletar', 'as' => 'divindade.deletar']);
Route::post('/divindade/salvar', ['uses' => 'DivindadeController@salvar', 'as' => 'divindade.salvar']);

Route::get('/personagem', ['uses' => 'PersonagemController@index', 'as' => 'personagem.index']);
Route::get('/personagem/detalhe/{personagem?}', ['uses' => 'PersonagemController@detalhe', 'as' => 'personagem.detalhe']);
Route::get('/personagem/deletar/{personagem?}', ['uses' => 'PersonagemController@deletar', 'as' => 'personagem.deletar']);
Route::post('/personagem/salvar', ['uses' => 'PersonagemController@salvar', 'as' => 'personagem.salvar']);

Route::get('/raca', ['uses' => 'RacaController@index', 'as' => 'raca.index']);
Route::get('/raca/detalhe/{raca?}', ['uses' => 'RacaController@detalhe', 'as' => 'raca.detalhe']);
Route::get('/raca/deletar/{raca?}', ['uses' => 'RacaController@deletar', 'as' => 'raca.deletar']);
Route::post('/raca/salvar', ['uses' => 'RacaController@salvar', 'as' => 'raca.salvar']);

Route::get('/dominio', ['uses' => 'DominioController@index', 'as' => 'dominio.index']);
Route::get('/dominio/detalhe/{dominio?}', ['uses' => 'DominioController@detalhe', 'as' => 'dominio.detalhe']);
Route::get('/dominio/deletar/{dominio?}', ['uses' => 'DominioController@deletar', 'as' => 'dominio.deletar']);
Route::post('/dominio/salvar', ['uses' => 'DominioController@salvar', 'as' => 'dominio.salvar']);

Auth::routes();

Route::get('phpinfo', function() {
    return view('info');
});