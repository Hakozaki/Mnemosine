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
Route::post('/arma/pesquisar', ['uses' => 'ArmaController@pesquisar', 'as' => 'arma.pesquisar']);
Route::post('/arma/imprimir', ['uses' => 'ArmaController@imprimir', 'as' => 'arma.imprimir']);
Route::get('/arma/imprimir/{arma}', ['uses' => 'ArmaController@imprimirDetalhe', 'as' => 'arma.imprimir.detalhe']);

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

Route::get('/batalha', ['uses' => 'BatalhaController@index', 'as' => 'batalha.index']);
Route::get('/batalha/detalhe/{batalha?}', ['uses' => 'BatalhaController@detalhe', 'as' => 'batalha.detalhe']);
Route::get('/batalha/deletar/{batalha?}', ['uses' => 'BatalhaController@deletar', 'as' => 'batalha.deletar']);
Route::post('/batalha/salvar', ['uses' => 'BatalhaController@salvar', 'as' => 'batalha.salvar']);
Route::get('/batalha/criaPartida', ['uses' => 'BatalhaController@criaPartida', 'as' => 'batalha.criaPartida']);
Route::post('/batalha/adicionarPersonagem', ['uses' => 'BatalhaController@adicionarPersonagem', 'as' => 'batalha.adicionarPersonagem']);
Route::post('/batalha/aplicarDano', ['uses' => 'BatalhaController@aplicarDano', 'as' => 'batalha.aplicarDano']);
Route::get('/batalha/ordenarIniciativa/{batalha_id?}', ['uses' => 'BatalhaController@ordenarIniciativa', 'as' => 'batalha.ordenarIniciativa']);
Route::get('/batalha/passaTurno/{batalha_id?}', ['uses' => 'BatalhaController@passaTurno', 'as' => 'batalha.passaTurno']);
Route::get('/batalha/passaRodada/{batalha_id?}', ['uses' => 'BatalhaController@passaRodada', 'as' => 'batalha.passaRodada']);
Route::get('/batalha/subirPosicao/{batalha_id?}/{id?}', ['uses' => 'BatalhaController@subirPosicao', 'as' => 'batalha.subirPosicao']);
Route::get('/batalha/descerPosicao/{id?}', ['uses' => 'BatalhaController@descerPosicao', 'as' => 'batalha.descerPosicao']);
Route::get('/batalha/retornaEfeitos/{batalha_id?}/{jogador_id?}', ['uses' => 'BatalhaController@retornaEfeitos', 'as' => 'batalha.retornaEfeitos']);
Route::get('/batalha/retornaTurnos/{batalha_id?}/{jogador_id?}', ['uses' => 'BatalhaController@retornaTurnos', 'as' => 'batalha.retornaTurnos']);
Route::get('/batalha/resetaEfeitos/{batalha_id?}', ['uses' => 'BatalhaController@resetaEfeitos', 'as' => 'batalha.resetaEfeitos']);

Route::get('/acompanhaBatalha', ['uses' => 'AcompanhaBatalhaController@index', 'as' => 'acompanhaBatalha.index']);
Route::get('/acompanhaBatalha/detalhe/{batalha?}', ['uses' => 'AcompanhaBatalhaController@detalhe', 'as' => 'acompanhaBatalha.detalhe']);
Route::get('/acompanhaBatalha/retornaJogadores/{batalha_id?}', ['uses' => 'AcompanhaBatalhaController@retornaJogadores', 'as' => 'acompanhaBatalha.retornaJogadores']);
Route::get('/acompanhaBatalha/retornaTurnos/{batalha_id?}', ['uses' => 'AcompanhaBatalhaController@retornaTurnos', 'as' => 'acompanhaBatalha.retornaTurnos']);
Route::get('/acompanhaBatalha/retornaBatalha/{batalha_id?}', ['uses' => 'AcompanhaBatalhaController@retornaBatalha', 'as' => 'acompanhaBatalha.retornaBatalha']);

Auth::routes();

Route::get('phpinfo', function() {
    return view('info');
});
