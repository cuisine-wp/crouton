<?php

    namespace Crouton\Facades;

    use Crouton\Exceptions\FacadeAccessorNotFoundException;

    class Aliases{

        /**
         * Returns a single class-alias
         *
         * @param String $name
         * 
         * @return String
         */
        public static function get( $name )
        {
            $aliases = static::all();

            if( !isset( $aliases[$name] ) ){
                throw new FacadeAccessorNotFoundException("The target class of the {$name} Facade could not be found.");
                return false;
            }

            return $aliases[$name];
        }

        /**
         * Returns all aliases as an array
         *
         * @return Array
         */
        public static function all(){
            return [
                'example' => 'Crouton\Example\Example'
            ];
        }

    }