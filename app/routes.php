<?php

/**
 *  GET routes
 **/
Route::get('/', 'PageController@home');
Route::get('estatisticas', 'PageController@statistics');
Route::get('contato', 'PageController@contact');
Route::get('linhas/{line}', 'BusController@line');
Route::get('reclamacao/{reclamacao_id}', 'ComplaintController@view');

/**
 *  POST routes
 **/
Route::post('registrar-relato', 'ComplaintController@store');

/**
 *  404 handling
 **/
App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});