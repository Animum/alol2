<?php namespace App\Anm\src\Common;

/**
*
*	Base Class Controller
*
*	Clase base para objetos controladores
*
*	@since 		5/12/2014
*	@version 	1.0
*	@author 	darioPlaza <darioplaza@animum3d.com>
*	@copyright	Animum Formación SL (c) 2014
*
**/

use App\Http\Controllers\Controller;

abstract class BaseController extends Controller {

	/**
	* @access protected
	* @var string Ruta a las vistas que maneja el controlador
	**/
	protected $pathView					= "";

	/**
	* @access protected
	* @var string Nombre de la clase que extiende la clase Eloquent
	**/
	protected $entityClass				= "";

	/**
	* @access protected
	* @var string Nombre de la vista principal del controlador 
	**/
	protected $indexView				= "index";

	/**
	* Setup the layout used by the controller.
	*
	* @access protected
	**/
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = \View::make($this->layout);
		}
	}

	/**
	* Este método provoca un error 404 si no existe el objeto $value
	*
	* @access protected
	* @param object 	$value 	Un objeto cualquiera
	**/
	protected function notFound($value)
	{
		if( !$value ) App::abort(404);
	}

	/**
	* Obtener la página HTML a partir de una view(vista)
	*
	* @param 	string 	$view 			Nombre de la vista.
	* @param 	string 	$params = null 	Parámetros para pasar a la vista.
	* @return 	string  Devuelve la página HTML generada.
	**/
	protected function getView( $view, $params = null )
	{

		//Comprobar si la página existe
		$this->notFound($view);

		if( isset($params) )
		{
			return \View::make( $this->pathView . "." . $view , $params );
		}
		else
		{
			return \View::make( $this->pathView . "." . $view );
		}
		
	}

	/**
	* Muestra la página principal del controller
	*
	* @param datatype $paramname description
	* 
	* @return Response
	* 
	**/
	public function getIndex()
	{
		//Mostrar página
		return $this->getView($this->indexView);
	}

}
