<?php
/**
 * Plugin Name: Crouton
 * Plugin URI: http://chefduweb.nl/cuisine
 * Description: Starting canvas for Cuisine plugins
 * Version: 1.2.2
 * Author: Luc Princen
 * Author URI: http://www.chefduweb.nl/
 * License: GPLv2
 * 
 * @package Cuisine
 * @category Core
 * @author Chef du Web
 */

//change this namespace
namespace Crouton;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// The directory separator.
defined('DS') ? DS : define('DS', DIRECTORY_SEPARATOR);


/**
 * Main class that bootstraps the plugin.
 */
if (!class_exists('PluginIgniter')) {

    class PluginIgniter {
    
        /**
         * Plugin bootstrap instance.
         *
         * @var \Crouton\PluginIgniter
         */
        private static $instance = null;

        /**
         * Plugin version.
         *
         * @var float
         */
        const VERSION = '1.1';


        /**
         * Plugin directory name.
         *
         * @var string
         */
        private static $dirName = '';

        private function __construct(){

            static::$dirName = static::setDirName(__DIR__);

            // Load plugin.
            $this->load();
        
        }


        /**
         * Load the framework classes.
         *
         * @return void
         */
        private function load(){

            //require the language domain:
            $path = __DIR__ . DS . '/Languages/';
            load_plugin_textdomain( 'crouton', false, $path );

            //require the autoloader:
            require( __DIR__ . DS . 'autoloader.php');

            //initiate the autoloader:
            ( new \Crouton\Autoloader() )->register()->load();

            //give off the loaded hook
            do_action( 'crouton_loaded' );

        }

        /*=============================================================*/
        /**             Getters & Setters                              */
        /*=============================================================*/


        /**
         * Init the plugin classes
         *
         * @return \Crouton\PluginIgniter
         */
        public static function getInstance(){

            if ( is_null( static::$instance ) ){
                static::$instance = new static();
            }
            return static::$instance;
        }

        /**
         * Set the plugin directory property. This property
         * is used as 'key' in order to retrieve the plugins
         * informations.
         *
         * @param string
         * @return string
         */
        private static function setDirName($path) {

            $parent = static::getParentDirectoryName(dirname($path));

            $dirName = explode($parent, $path);
            $dirName = substr($dirName[1], 1);

            return $dirName;
        }

        /**
         * Check if the plugin is inside the 'mu-plugins'
         * or 'plugin' directory.
         *
         * @param string $path
         * @return string
         */
        private static function getParentDirectoryName($path) {

            // Check if in the 'mu-plugins' directory.
            if (WPMU_PLUGIN_DIR === $path) {
                return 'mu-plugins';
            }

            // Install as a classic plugin.
            return 'plugins';
        }

        

        /**
         * Get the plugin path
         * 
         * @return string
         */
        public static function getPluginPath(){
        	return __DIR__.DS;
        }

        /**
         * Returns the directory name.
         *
         * @return string
         */
        public static function getDirName(){
            return static::$dirName;
        }

    }
}


/**
 * Load the main class, when Cuisine is loaded
 *
 */
add_action('cuisine_loaded', function(){

	\Crouton\PluginIgniter::getInstance();

});

