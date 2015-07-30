<?php namespace App\Anm\src\field;

/**
*
*	Clase Componente Field.
*
*	Basado en una idea original de Duilio Palacios, del curso Laravel de Mejorando.la
*	@link 		http://mejorando.la
*
*	@since 		5/12/2014
*	@version 	1.0
*	@author 	darioPlaza <darioplaza@animum3d.com>
*	@copyright	Animum Formación SL (c) 2014
*
*/

use Collective\Html\FormBuilder		as Form;
use Illuminate\View\Factory 		as View;
use Illuminate\Session\Store 		as Session;
use App\Anm\src\Common\BaseComponent;

class Field extends BaseComponent
{

	/**
	*	Propiedad que guarda las Clases css para las etiquetas div que contiene
	*	un control Input.
	*
	* @access protected
	* @var array
	*/
	protected $defaultInputCssClass = [
		'default'	=>	'form-control',
		'checkbox'	=>	''
	];

	/**
	* Objeto form que se está editando.
	*
	* @access protected
	* @var object
	*/
	protected $form;

	/**
	* 	Constructor de la clase. Inyección de dependencias.
	*
	*	@param $form 	 	Objeto Formulario
	*	@param $view 		Objeto Vista
	*	@param $session 	Objeto Sesión
	*
	*	@return void
	*/
	public function __construct( Form $form, View $view, Session $session )
	{
		//Formulario
		$this->form = $form;

		//Ruta por defecto a las plantillas blade del componente
		parent::__construct( 'field', '/Anm/src/field/views/', $view, $session );
	}

	/**
	* Obtener la clase css según el 'type' pasado por parámetro
	*
	*	@param $type 	Tipo de control input
	*
	*	@return string
	*/
	private function getDefaultClass( $type )
	{
		if( isset($this->defaultInputCssClass[$type]) )
		{
			return $this->defaultInputCssClass[$type];
		}

		return $this->defaultInputCssClass['default'];
	}

	/**
	* 	Construye las clases css del 'type' pasado por parámetro
	*
	*	@param $type 			Tipo de control input
	*	@param &$attributes 	Atributos de clase adicionales al control
	*
	* 	@return none
	*/
	private function buildCssClasses( $type, &$attributes )
	{

		$css = $this->getDefaultClass($type);

		if( isset($attributes['class']) )
		{
			$attributes['class'] .= ' ' . $css;
		}
		else
		{
			$attributes['class'] = $css;	
		}
	}

	/**
	*	Contruir la etiqueta del input
	*
	*	@param 	string 	$name 	Nombre del control input
	*	@return string 	Etiqueta HTML del control input
	*/
	private function buildLabel( $name )
	{
		//Averigua si la etiqueta está definida en el diccionario de Laravel.
		if( \Lang::has('validation.attributes.' . $name) )
		{
			//Contruir label a partir del texto definido en el diccionario.
			$label = \Lang::get('validation.attributes.' . $name );
		}
		else
		{
			//Construir label a partir del nombre de campo pasado por parámetro
			$label = str_replace('_', ' ', ucfirst($name) );
		}

		return $label;
	}

	/**
	*	Contruir el control del typo pasado por parámetro
	*
	*	@param string 	Tipo de control HTML. select|password|checkbox|input
	*	@param string 	Nombre del control HTML. Etiqueta "name".
	*	@param string 	Valor inicial del control HTML. Etiqueta "value".
	*	@param array 	Atributos que se añaden a la etiqueta HTML del control.
	*	@param array 	Opciones para un control HTML de tipo "select".
	*
	*	@return Form
	*/
	private function buildControl( $type, $name, $value = null, $attributes = array(), $options = array() )
	{
		switch ($type) 
		{
			case 'select':
				//Agregar primero un valor vacio
				array_unshift($options, 'Seleccione un dato');
				
				//Campo tipo select
				return $this->form->select( $name, $options, $value, $attributes );

			case 'password':
				//Campo tipo password
				return $this->form->password( $name, $attributes );

			case 'checkbox':
				//Campo tipo checkbox
				return $this->form->checkbox( $name );

			case 'textarea':
				//Campo tipo area de texto
				return $this->form->textarea( $name, $value, $attributes );

			case 'hidden':
				//Campo tipo hidden
				return $this->form->hidden( $name, $value );			
			
			default:
				//Por defecto, campo tipo input
				return $this->form->input( $type, $name, $value, $attributes );
		}
	}

	/**
	*	Contruir el mensaje de error para la validación
	*
	*	@param 	string 	$name 	Nombre del error
	*	@return string 	Descripción del error
	*/
	private function buildError( $name )
	{
		//Variables
		$error = null;

		//Comprobar si hay algún error en la sesión de Laravel
		if( $this->session->has('errors') )
		{
			$errors = $this->session->get('errors');

			//Comprobar si de los errores que hay, alguno pertenece al control pasado opr parámetro 'name'
			if( $errors->has($name) )
			{
				$error = $errors->first($name);
			}

		}

		return $error;
	}

	/**
	*	Contruir un control Input
	*
	*	@param 	string 	$type 		Tipo de input.
	*	@param 	string 	$nameField 	Nombre del input. Deberá coincidir con el nombre campo.
	*	@param 	string 	$value 		Valor inicial.
	*	@param 	array 	$attributes Atributos para el tag input.
	*	@param 	array 	$options 	Opciones para un input de tipo select.
	*	@return string 	Componente Field basado en la plantilla type.
	*/
	public function buildInput( $type, $nameField, $value = null, $attributes = array(), $options =  array() )
	{

		//Variables
		$label 		= "";
		$control	= "";
		$error 		= "";

		//Recupera la plantilla del Componente según type.
		$template 	= $this->buildTemplate($type);

		if( $type!='hidden' )
		{
			//Contruye las clases CSS necesarias para el input según type.
			$this->buildCssClasses($type, $attributes);
			//Contruye una etiqueta dependiendo del nombre del campo.
			$label 		= $this->buildLabel($nameField);
			//Contruye el control input.
			$control 	= $this->buildControl($type, $nameField, $value, $attributes, $options);
			//Contruye el mensaje de error de validación si lo tiene.
			$error 		= $this->buildError($nameField);

		}
		else
		{
			//Para input de tipo hidden, contruye el control input sin clases, label ni error
			$control 	= $this->buildControl( $type, $nameField, $value );

		}

		//Parámetros adicionales para el componente
		$params = array(
			'nameField'	=>	$nameField,
			'label'		=>	$label,
			'contro'	=>	$control,
			'error'		=>	$error
		);

		//Retorna una vista del componente Field.
		return $this->view->make($template, compact('nameField','label','control','error'));
		//return $this->buildComponent( $template, $cssClasses, $params );

	}

	/**
	*	Construye un control Input de tipo hidden.
	*
	*	@param 	string 	$name 	Nombre del campo
	*	@param 	string 	$value 	Valor inicial
	*	@return string 	Vista del componente Field.
	*/
	public function hidden( $name, $value )
	{
		return $this->buildInput( 'hidden', $name, $value );
	}

	/**
	*	Construye un control Input de tipo password.
	*
	*	@param 	string 	$name 		Nombre del campo
	*	@param 	array 	$attibutes 	Atributos del control input
	*	@return string 	Vista del componente Field.
	*/
	public function password( $name, $attributes = array())
	{
		return $this->buildInput( 'password', $name, null, $attributes );
	}

	/**
	*	Construye un control Input de tipo select.
	*
	*	@param 	string 	$name 		Nombre del campo
	*	@param 	array 	$options 	Opciones para seleccionar
	*	@param 	string 	$value 		Valor inicial
	*	@param 	array 	$attibutes 	Atributos del control input
	*	@return string 	Vista del componente Field.
	*/
	public function select( $name, $options, $value = null,  $attributes = array() )
	{
		return $this->buildInput( 'select', $name, $value, $attributes, $options );
	}

	/**
	*	Capturar llamadas a métodos no declaradas
	*
	*	@param 	string 	$method 	Nombre del método
	*	@param 	array 	$params 	Array de parámetros pasados al método
	*	@return mixed
	*/
	public function __call($method, $params)
	{

		//Todas los métodos que no estén declarados de forma explícita, se 
		//llamará a input pasando el nombre del método como 1º parámetro.

		//Añade al array params el nombre del método
		array_unshift($params, $method);
		return call_user_func_array( [$this, 'buildInput'], $params);

	}

}