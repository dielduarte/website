<?php

/**
 *  GET routes
 **/
Route::get('/', [
    'as'    => 'home',
    'uses'  => 'PageController@home'
]);

Route::get('estatisticas', [
    'as'    => 'stats',
    'uses'  => 'PageController@statistics'
]);

Route::get('na-midia', 'PageController@media');
Route::get('equipe', 'PageController@team');
Route::get('fotos', 'PageController@photos');
Route::get('contato', 'PageController@contact');

Route::get('linhas/{line}', [
    'as'    => 'bus.index',
    'uses'  => 'BusController@line'
]);

Route::get('linhas/{line}/reclamacoes', [
    'as'    => 'bus.complaints',
    'uses'  => 'BusController@complaints'
]);

Route::get('avaliar/{line}', [
    'as'    => 'score.form',
    'uses'  => 'ScoreController@form'
]);

Route::post('avaliar/{line}', [
    'before'    => 'csrf',
    'as'        => 'score.post.form',
    'uses'      => 'ScoreController@store'
]);

Route::get('adicionar-linha', 'BusController@addBusLine');

Route::get('reclamacao/{reclamacao_id}', 'ComplaintController@view');

Route::get('tipo-de-reclamacao/{slug}', 'ReasonController@lists');


/**
 * POST routes
 */
Route::post('registrar-relato', [
    'as'    => 'complaint.post',
    'uses'  =>'ComplaintController@store'
]);

Route::post('adicionar-linha', 'BusController@postNewLine');

/**
 * 404
 */
App::missing(function ($exception) {
    return Response::view('errors.missing', array(), 404);
});