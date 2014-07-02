<?php

/**
 *  GET routes
 **/
Route::get('/', 'PageController@home');
Route::get('estatisticas', 'PageController@statistics');
Route::get('na-midia', 'PageController@media');
Route::get('equipe', 'PageController@team');
Route::get('fotos', 'PageController@photos');
Route::get('contato', 'PageController@contact');
Route::get('linhas/{line}', 'BusController@line');
Route::get('adicionar-linha', 'BusController@addBusLine');
Route::get('reclamacao/{reclamacao_id}', 'ComplaintController@view');
Route::get('tipo-de-reclamacao/{slug}', 'ReasonController@lists');

/**
 *  POST routes
 **/
Route::post('registrar-relato', 'ComplaintController@store');
Route::post('adicionar-linha', 'BusController@postNewLine');

/**
 *  404 handling
 **/
App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});