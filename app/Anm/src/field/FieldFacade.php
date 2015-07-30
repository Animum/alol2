<?php namespace App\Anm\src\field;

use Illuminate\Support\Facades\Facade;

class FieldFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'field'; }

}
