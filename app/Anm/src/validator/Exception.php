<?php namespace anm\src\validator;

/**
*
*	Clase para controlar excepciones en las Validaciones.
*
* 	Hay que modificar el archivo start/global.php y añadir el siguiente código
* 	dentro del bloque "Application Error Handler":
* 	
* 	App::error( function( \anm\validator\Exception $exception )
*  	{
*   	return Redirect::back()->withInput()->withErrors( $exception->getErrors() );
*   });
*
*	@since 		7/12/2014
*	@version 	1.0
*	@author 	darioPlaza <darioplaza@animum3d.com>
*	@copyright	Animum Formación SL (c) 2014
*
*/

class ValidationException extends \Exception
{

	protected $errors;

	public function __construct($message, $errors)
	{
		$this->errors = $errors;
		parent::__construct($message);
	}

	public function getErrors()
	{
		return $this->errors;
	}

}