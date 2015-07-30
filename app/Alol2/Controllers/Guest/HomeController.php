<?php namespace App\Alol2\Controllers\Guest;

/**
*
*	Class Home Controller
*
*	@since 		1/12/2014
*	@version 	1.0
*	@author 	darioPlaza <darioplaza@animum3d.com>
*	@copyright	Animum Formación SL (c) 2014
*
*/

use App\Anm\src\Common\BaseController;

class HomeController extends BaseController {

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->pathView = "Guest";
		$this->indexView = "home";
	}
}