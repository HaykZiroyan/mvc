<?php

namespace libs;

abstract class DefaultLib {

    protected static $instance;
    abstract protected function __construct();

    /**
     * @return static
     */
    public static function getInstance()
    {
        if (!static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

}