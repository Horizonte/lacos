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

/*Route::get('/', function()
{
	return View::make('users');
});*/


/*Route::get('/Users', function()
{
	$users = User::all();
	return View::make('users.index')->with('users', $users);
});*/

Route::get('Users', function()
{
	$users = User::all();
	//return View::make('users.index')->with('users', $users);
	$dados = array(
		'nome' => $users[0]->name, 
		'email' => $users[0]->email,
	);
	return View::make('users.index', $dados);
});
