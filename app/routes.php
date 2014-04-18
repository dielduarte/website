<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home.index');
});


Route::post('registrar-relato', function(){

    $validation = Complaint::validate(Input::except('_token'));
    if($validation->fails())
    {
        return Redirect::to('/')->withErrors($validation)->withInput();
    } 
    else
    {
        $complaint = Complaint::create(Input::except('_token'));
        return Redirect::to('reclamacao/' . $complaint->id )
            ->with('message', 'O seu relato foi adicionado com sucesso! 
                Compartilhe com seus amigos a sua história.')
            ->with('messageType', 'success');  
    }
});

Route::get('linhas/{line}', function($line){
    $bus = Bus::whereLine($line)->first();
    if ( $bus )
    {
        return View::make('buses.view')->with('bus', $bus);
    }
    App::abort(404);
});

Route::get('reclamacao/{reclamacao_id}', function($reclamacao_id){
    $complaint = Complaint::findOrFail($reclamacao_id);
    return View::make('complaints.view')->with('complaint', $complaint);
});

Route::get('estatisticas', function(){
    return View::make('estatisticas.index');
});

Route::get('contato', function(){
   return View::make('contato'); 
});

App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});