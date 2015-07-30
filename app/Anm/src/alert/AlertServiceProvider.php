<?php namespace App\Anm\src\alert;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class AlertServiceProvider extends ServiceProvider
{

    /**
     * Registrar el proveedor del servicio.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAlert();
        $this->setAliases();
    }

    public function registerAlert()
    {
        $this->app->bind('alert', function($app)
        {
            return new Alert($app['session.store'], $app['view']);
        });
    }

    /**
     *  Crear un alias para el Service Provider
     */
    public function setAliases()
    {
        $this->app->booting( function()
        {
            $loader = AliasLoader::getInstance();
            
            // Facades
            $loader->alias('Alert', 'App\Anm\src\alert\AlertFacade');
        });
    }
}