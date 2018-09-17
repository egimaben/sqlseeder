<?php

namespace App;

require "vendor/autoload.php";


use Illuminate\Database\Capsule\Manager;

class Bootstrap
{
    protected static $connManager = null;

    public static function boot($dbdriver, $dbhost, $dbname, $dbuser, $dbpassword)
    {
        if (!isset(static::$connManager)) {

            static::$connManager = new Manager;


            static::$connManager->addConnection([

                "driver" => $dbdriver,

                "host" => $dbhost,

                "database" => $dbname,

                "username" => $dbuser,

                "password" => $dbpassword

            ]);

            static::$connManager->setAsGlobal();
            static::$connManager->bootEloquent();
            static::$connManager->bootEloquent();
        }
    }
}

