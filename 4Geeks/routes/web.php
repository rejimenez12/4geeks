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

Route::get('/', [

	'as'   => 'getLogin',
	'uses' => 'HomeController@getLogin'
 
]);

Route::post('/login', [

	'as'   => 'postLogin',
	'uses' => 'HomeController@postLogin'
 
]);

Route::get('/logout',[

	'as'   => 'getLogout',
	'uses' => 'HomeController@getLogout'
]);

Route::get('/register', [

	'as'   => 'getRegister',
	'uses' => 'HomeController@getRegister'

]);

Route::post('/register', [

	'as'   => 'postRegister',
	'uses' => 'HomeController@postRegister'

]);


Route::get('/home',[

	'as'   => 'home',
	'uses' => 'HomeController@home'

]);
