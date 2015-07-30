<?php namespace App\Anm\src\alert;

use Illuminate\Session\Store as Session;
use Illuminate\View\Factory as View;

/**
*
*   Clase Componente Alert.
*
*   Basado en una idea original de Duilio Palacios, del tutorial de Cristalab.com
*   @link       http://www.cristalab.com/tutoriales/poo-inyeccion-de-dependencias-en-laravel-iv-c113305l/
*
*   @since      21/07/2015
*   @version    1.0
*   @author     darioPlaza <darioplaza@animum3d.com>
*   @copyright  Animum Formación SL (c) 2015
* 
*/

use App\Anm\src\Common\BaseComponent;

class Alert extends BaseComponent
{

    /*
    *   Nombre de la variable que guarda los mensajes entre sesiones.
    */
    const SESSION_NAME = 'AlertMessages';

    /**
    *   Constructor de la clase. Inyección de dependencias.
    *
    *   @param $view        Objeto Vista
    *   @param $session     Objeto Sesión
    *
    *   @return void
    */
    public function __construct(Session $session, View $view)
    {
        //Guardar sesión activa
        $this->session = $session;
        //Guardar la vista activa
        $this->view = $view;

        //Ruta a las plantillas blade del componente
        //parent::__construct( 'alert', '/App/Anm/src/alert/views/', $view, $session );
    }

    /**
    * Guarda mensajes  
    * 
    *   @param string $message Texto del mensaje
    *   @param string $type Tipo de mensaje (success|info|warning|danger)
    */
    public function message($message, $type)
    {
        //Obtener los mensajes guardados entre sesiones
        $messages = $this->session->get(static::SESSION_NAME, array());

        //Añade un nuevo elemento mensaje al array de mensajes
        $messages[] = compact('message', 'type');
        
        //Guarda los mensajes solamente para el siguiente request.
        $this->session->flash(static::SESSION_NAME, $messages);
    }

    /**
     * Muestra los mensajes
     * 
     * @param string $template Nombre de la plantilla para usar. Por defecto 'alert'.
     * 
     */
    public function render($template = 'alert')
    {
        //Recuperar mensajes de la sesión. Si no hay, por defecto null
        $messages = $this->session->get(static::SESSION_NAME, null);

        //Comprobar si se han recuperado mensajes pendientes de mostrar
        if ($messages != null)
        {
            //
            $this->session->flash(static::SESSION_NAME, null);

            //Retorna la vista con los mensajes
            return $this->view->make($template)->with('messages', $messages);
        }

        return "";
    }

}