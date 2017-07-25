<?php

declare(strict_type=1);

namespace TsvLib\Patterns;

class Singleton implements Interfaces\Singleton
{
    /**
     * @var Singleton|null
     */
    private static $_instance = null;

    /**
     * Disable creating multiple copies
     */
    private function __construct() {}

    /**
     * Disable cloning object
     */
    protected function __clone() {}

    /**
     * Get current object instance
     * @return self
     */
    static public function getInstance()
    {
        self::createInstance();
        return self::$_instance;
    }

    public static function createInstance()
    {
        if(is_null(self::$_instance)) {
            self::$_instance = new self();
        }
    }



}
