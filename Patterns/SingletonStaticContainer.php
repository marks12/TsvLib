<?php

declare(strict_type=1);

namespace TsvLib\Patterns;

use \Exception;

/**
 * Class SingletonStaticContainer can store and return if need your values by key
 * @package TsvLib\Patterns
 * @author Vladimir Tsarevnikov
 */
class SingletonStaticContainer extends Singleton
{
    /**
     * Contain any data types as key => value array
     * @var array
     */
    private static $_tsv_container = [];

    /**
     * Check is key not exists in container. If exists make exception
     * @param string $key
     * @return bool
     * @throws Exception
     */
    private static function validate_not_exists(string $key) : bool
    {
        if(self::is_exists($key)) {
            throw new Exception('Key ' . $key . ' is not uniq. It is allready exists. Please use ovewrite method for overridable parametrs');
        }

        return true;
    }

    /**
     * Check is key exists in container. If not exists make exception
     * @param string $key
     * @return bool
     * @throws Exception
     */
    private static function validate_exists(string $key) : bool
    {
        if(!self::is_exists($key)) {
            throw new Exception('Key ' . $key . ' is not not exist. You should create non exists element before try to get it. Or check exists with isset() method');
        }

        return true;
    }

    /**
     * Check exists value by key in container
     * @param string $key
     * @return bool
     */
    public static function is_exists(string $key) : bool
    {
        return isset(self::$_tsv_container[$key]);
    }

    /**
     * Add array of elements to container storage
     * @param array $elements
     */
    static public function import(array $elements) : void
    {
        self::createInstance();
        foreach ($elements as $k=>$value) {
            self::add($k, $value);
        }
    }

    /**
     * Get all of elements from container storage as array
     * @return array
     */
    static public function export() : array
    {
        self::createInstance();
        return self::$_tsv_container;
    }

    /**
     * Get exists element from container storage
     * @param string $key
     * @return mixed
     * @throws Exception
     */
    static public function get(string $key) : mixed
    {
        self::createInstance();
        self::validate_exists($key);
        return self::$_tsv_container[$key];
    }

    /**
     * Add uniq non exists parameter to container
     * @param string $key
     * @param mixed $value
     */
    static public function add(string $key, mixed $value) : void
    {
        self::createInstance();
        self::validate_not_exists($key);
        self::$_tsv_container[$key] = $value;
    }

    /**
     * Add parameter to container and override if exists
     * @param string $key
     * @param mixed $value
     */
    static public function overwrite(string $key, mixed $value) : void
    {
        self::createInstance();
        self::$_tsv_container[$key] = $value;
    }
}