<?php
namespace Crouton;

class Autoloader
{

    /**
     * Load the initial static files:
     *
     * @return void
     */
    public function load()
    {
        //for the front:
        Front\Events::getInstance();
        Front\Assets::getInstance();

        //and the admin:
        if (is_admin()) {
            Admin\Ajax::getInstance();
            Admin\Assets::getInstance();
            Admin\Events::getInstance();
            Admin\Metaboxes::getInstance();
        }
    }


    /**
     * Register the autoloader
     *
     * @return Crouton\Autoloader
     */
    public function register()
    {
        spl_autoload_register(function ($class) {

            if ( stripos( $class, __NAMESPACE__ ) === 0 ) {

                $filePath = str_replace( '\\', DS, substr( $class, strlen( __NAMESPACE__ ) ) );
                include( __DIR__ . DS . 'Classes' . $filePath . '.php' );

            }

        });

        return $this;
    }
}