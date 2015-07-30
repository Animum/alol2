<?php namespace App\Alol2\Controllers\Guest;

/**
*
*	Class Home Controller
*
*	@since 		24/07/2015
*	@version 	1.0
*	@author 	darioPlaza <darioplaza@animum3d.com>
*	@copyright	Animum Formación SL (c) 2014
*
*/

use App\Anm\src\Common\BaseController;
//use alol2\Guest\LoginValidator;

class LoginController extends BaseController {

	/*
	*	Constructor
	*/
	public function __construct()
	{
		$this->pathView = "Guest";
		$this->indexView = "login";
	}

	/**
	 * 
	 */
	public function update()
	{

		//Recoger los datos de entrada
		$datos = Input::all();

		//Crear objeto validador del login
		//$loginValidator = new LoginValidator($accessLog, $datos);

		//Guardar los datos del login si son válidos
		//$loginValidator->isValid();

	}

}