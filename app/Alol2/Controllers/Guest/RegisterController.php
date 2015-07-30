<?php namespace App\Alol2\Controllers\Guest;

/**
*
*	Class Register Controller
*
*	@since 		8/07/2014
*	@version 	1.0
*	@author 	darioPlaza <darioplaza@animum3d.com>
*	@copyright	Animum Formación SL (c) 2015
*
*/

use App\Anm\src\Common\BaseController;

class RegisterController extends BaseController {

	/*
	*	Constructor
	*/
	public function __construct()
	{
		$this->pathView = "Guest";
		$this->indexView = "register";
	}

	public function update()
	{
		
	}

}
