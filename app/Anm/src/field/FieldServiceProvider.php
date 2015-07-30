<?php namespace App\Anm\src\field;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class FieldServiceProvider extends ServiceProvider
{

    /**
     * Registrar el proveedor del servicio.
     *
     * @return void
     */
	public function register()
	{

		//Crear Alias
		$this->setAliases();

		$this->app['field'] = $this->app->share( function($app)
			{
				$field = new Field( $app['form'], $app['view'], $app['session.store'] );
				return $field;
			}
		);
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
            $loader->alias('Field', 'App\Anm\src\field\FieldFacade');
        });
    }
}
