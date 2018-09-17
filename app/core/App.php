<?php
/**
 * Created by PhpStorm.
 * User: benedictayiko
 * Date: 17/09/2018
 * Time: 18:10
 */

namespace App\Core;


class App
{

    static $registry = [];

    public static function put($key, $value)
    {
        static::$registry[$key] = $value;
    }

    public static function get($key)
    {
        if (array_key_exists($key, static::$registry)) {
            return static::$registry[$key];
        } else {
            return null;
        }
    }

}