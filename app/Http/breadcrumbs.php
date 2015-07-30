<?php 

/**
 *
 *	Breadcrumbs
 *
 *	@since 		9/06/2015
 *	@version 	1.0
 *	@author 	darioPlaza <darioplaza@animum3d.com>
 *	@copyright	Animum Formación SL (c) 2014
 *
 **/

Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('Inicio', route('home'));
});

Breadcrumbs::register('login', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Login', route('login'));
});

Breadcrumbs::register('forgetPassword', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Solicitar Contraseña', route('forgetPassword'));
});

Breadcrumbs::register('register', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Crear Cuenta', route('register'));
});