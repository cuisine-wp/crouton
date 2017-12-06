<?php

namespace Crouton\Facades;

use Crouton\Contracts\Facade;

class Example extends Facade
{

    /**
     * Return the igniter service key responsible for the Example class.
     * The key must be the same as the one used in the assigned
     * igniter service.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'example';
    }

}
