<?php namespace App\Anm\src\alert;

use Illuminate\Support\Facades\Facade;

class AlertFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'alert'; }

}