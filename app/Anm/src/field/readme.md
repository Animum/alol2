
## Instalación


Estas instrucciones instala y registra el paquete y crea un alias llamado "Field" en Laravel.


### 1. Instalar con Composer

(Aún no está preparado)

### 2. Añadir a `app/config/app.php`

```php
    'providers' => array(
        // ...
        'anm\field\FieldServiceProvider',,
    ),
```

y:

```php
    'aliases' => array(
        // ...
        'Field'				=> 'anm\field\Facade',
    ),
```

## Uso