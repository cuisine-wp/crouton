<?php
namespace Crouton\Contracts;

abstract class StaticInstance
{


    /**
     * Static bootstrapped instance.
     *
     * @var \Crouton\Contracts\StaticInstance
     */
    public static $instance = null;


    /**
     * Private constructor. Avoid building instances using the
     * 'new' keyword.
     */
    protected function __construct()
    {
    }


    /**
     * Init the Assets Class
     *
     * @return \Crouton\Contracts\StaticInstance
     */
    public static function getInstance()
    {

        return static::$instance = new static();

    }


} 