<?php namespace anm\src\validator;

/**
*
*	Clase Base para validación de datos
*
*	@since 		5/12/2014
*	@version 	1.0
*	@author 	darioPlaza <darioplaza@animum3d.com>
*	@copyright	Animum Formación SL (c) 2014
*
*/

use anm\validator\Exception as ValidatorException;

abstract class BaseValidator
{

	/**
	* Objeto de clase que extienda Eloquent
	*
	* @access protected
	* @var object
	*/
	protected $entity;

	/**
	* Array de datos para guardar
	*
	* @access protected
	* @var array
	*/
	protected $data;

	/**
	* Objeto de clase Validator
	*
	* @access protected
	* @var object
	*/
	protected $validator;

	/**
	* Constructor de la clase
	*
	* @param 	object 	$entity 	Objeto de una clase que extienda eloquent
	* @param  	array 	$data 	 	Array de datos para validar y guardar
	*/
	public function __construct( $entity, $data )
	{
		//Guardar el objeto Entity
		$this->entity 	= $entity;

		//Guardar datos
		$this->setData( $data );

	}

	/**
	* Devuelve las reglas de validación
	*
	* @return array 	Reglas de validación
	*/
	abstract public function getRules();

	/**
	* Devuelve los mensajes de validación
	*
	* @return array 	Mensajes de validación
	*/
	abstract public function getMessages();

	/**
	 * 	Prepara los datos a guardar.
	 *	Sobrecargar este método en las clases que hereden
	 *	para devolver un array de datos inicializado.
	 *
	 *	@param 	array 	$data 	Array de datos
	 *
	 * 	@return void
	 */
	protected function setData( $data )
	{
		$this->data 	= array_only( $data, array_keys( $this->getRules() ) );
	}

	/**
	 * Método para validar los datos
	 *
	 * @return boolean
	 */
	public function isValid()
	{

		//Llamar a la clase con \ para que acceda al espacio de nombres global
		$this->validator = \Validator::make( $this->data, $this->getRules(), $this->getMessages() );

		if( $this->validator->fails() )
		{
			throw new ValidatorException('La Validación falló.', $this->validator->messages() );
		}

		return true;

	}

	/**
	 * Función para guardar los datos
	 *
	 *	@param  Eloquent 	$record 	Objeto de una clase que extienda Eloquent
	 *
	 *	@return boolean
	 */
	public function save()
	{

		//Validar de los datos
		$this->isValid();

		//Rellena los datos en el objeto de clase Entity.
		$this->entity->fill( $this->data );

		//Guarda los datos del objeto de clase Entity.
		$this->entity->save();

		return true;
	}

}