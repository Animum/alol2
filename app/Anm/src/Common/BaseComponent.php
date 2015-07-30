<?php namespace App\Anm\src\Common;

/**
 *
 *	Clase BaseComponent
 *
 *	@since 		7/12/2014
 *	@version 	1.0
 *	@author 	darioPlaza <darioplaza@animum3d.com>
 *	@copyright	Animum Formación SL (c) 2014
 *
 */

use Illuminate\View\Factory 		as View;
use Illuminate\Session\Store 		as Session;

abstract class BaseComponent {

	/**
	 * Ruta a las plantillas blade para el componente.
	 *
	 * @access protected
	 * @var string
	 */
	protected $pathView = "";

	/**
	 * Namespace para la Ruta a las plantillas.
	 *
	 * @access protected
	 * @var string
	 */
	protected $namespaceView = "";

	/**
	 * Objeto View 
	 *
	 * @access protected
	 * @var object
	 */
	protected $view;

	/**
	 * Objeto sesión de Laravel.
	 *
	 * @access protected
	 * @var object
	 */
	protected $session;

	/**
	 * Atributos del componente.
	 * @var array
	 */
	protected $attributes = array();

	/**
	 *	Clases css del componente
	 * @access protected
	 * @var string
	 */
	protected $cssClasses = "";

	/*
	 *	 * Contructor
	 * @param Entity $entity Entidad donde coger datos para la tabla
	 */
	public function __construct($namespaceView, $pathView, View $view, Session $session) {

		//Ruta a las plantillas blade del componente
		$this->pathView = app('path') . $pathView;
		$this->namespaceView = $namespaceView;

		//Guardar objeto vista
		$this->view = $view;

		//Añadir la ruta
		$this->view->addNamespace($namespaceView, $this->pathView);

		//Guardar objeto sesión
		$this->session = $session;

	}

	/**
	 * Obtener la clase css
	 *	@param 	string 	$class 	Clase del componente
	 *	@return string
	 */
	private function getCssClass($class)
	{
		if ( isset( $class ) && isset( $this->cssClasses[ $class ] ) )
		{
			return $this->cssClasses[ $class ];
		}

		//No tiene clase
		return "";
	}

	private function attributes2string()
	{
		//Serializar los atributos
		$strAttributes = "";
		foreach ($this->attributes as $key => $value) {
			$strAttributes = $strAttributes . " " . $key . "='" . $value . "' ";
		}
		return $strAttributes;
	}

	/**
	 *	Devuelve la plantilla del componente Field según el tipo.
	 *
	 *	@param 	string 	$type 	Tipo de Field.
	 *	@return string 	Plantilla del componente Field.
	 */
	protected function buildTemplate($type)
	{

		//Comprobar si existe plantilla para 'type'
		//var_dump( $this->pathView . $type . '.blade.php' );
		//dd( \File::exists( $this->pathView . $type . '.blade.php') );
		if (\File::exists($this->pathView . $type . '.blade.php')) {

			//Retorna la plantilla type
			if ($this->namespaceView) {
				return $this->namespaceView . '::' . $type;
			}

			return $type;

		}

		//Retorna la plantilla por defecto
		if ($this->namespaceView) {
			return $this->namespaceView . '::default';
		}

		return 'default';

	}

	/**
	 * Construye el componente
	 * @param  string $template   Plantilla blade para el componente
	 * @param  array  $params Parámetros para pasar a la plantilla
	 * @return string         HTML del componente
	 */
	protected function buildComponent( $template = 'default', $cssClasses = array(), $params = array() )
	{

		//Añadir clases para el atributo class
		$this->cssClasses = "";
		foreach ($cssClasses as $key => $value) {
			$this->cssClasses = $value . " " . $this->cssClasses;
		}

		//Añadir class como atributo por defecto
		$this->attributes['class'] = $this->cssClasses;

		//Recupera la plantilla del Componente según el parámetro template.
		$template = $this->buildTemplate($template);

		//Añadir los atributos a los paramétros
		$params['attributes'] = $this->attributes2string();

		//Retorna una vista del componente
		return $this->view->make($template, $params)->render();

	}

}