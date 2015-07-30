<?php

/**
 *  Rutas que usan los usuarios invitados
 *
 * @since    7/01/2015
 * @version  1.0
 * @author   darioPlaza <darioplaza@animum3d.com>
 * @copyright  Animum Formación SL (c) 2014
 *
 */

//Agrupar páginas para usuarios no logeados (guests o invitados)
Route::group(['before' => 'guest'], function()
{

	//Página de Inicio
	Route::get('/', array(
		'as' 	=>	'home',
		'uses'	=>	'\App\Alol2\Controllers\Guest\HomeController@getIndex'
	));

	//Rutas de Login
	Route::get('/login', array(
		'as' 	=>	'login',
		'uses' 	=>	'\App\Alol2\Controllers\Guest\LoginController@getIndex',
	));
	Route::post('/validateUser', array(
		'before'	=>	'csrf',
		'as'		=>	'validateLogin',
		'uses' 		=>	'LoginController@update',
	));

	//Routes of Forget Password
	Route::get('/forgetPassword', array(
		'as'		=>	'forgetPassword',
		'uses'		=>	'\App\Alol2\Controllers\Guest\ForgetPasswordController@getIndex'
	));
	Route::post('/validateForgetPassword', array(
		'before'	=>	'csrf',
		'as'		=>	'validateForgetPassword',
		'uses'		=>	'ForgetPasswordController@update'
	));

	//Rutas de register
	Route::get('/register', array(
		'as' 	=>	'register',
		'uses' 	=>	'\App\Alol2\Controllers\Guest\RegisterController@getIndex',
	));
	Route::post('/validateRegister', array(
		'before'	=>	'csrf',
		'as'		=>	'validateRegister',
		'uses' 		=>	'\App\Alol2\Controllers\Guest\RegisterController@update',
	));

/*
	//Account routes
	Route::get('/account/create', array(
		'as'		=>	'accountCreateForm',
		'uses'		=>	'AccountCrudController@create'
	));
	Route::post('/account/create', array(
		'before'	=>	'csrf',
		'as'		=>	'accountCreate',
		'uses'		=>	'AccountCrudController@store'
	));

	//Página de Contáctanos
	Route::get('/contact', array(
		'as'		=>	'contact',
		'uses'		=>	'HomeController@showContact'
	));
*/

});