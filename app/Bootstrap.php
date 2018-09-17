<?php

namespace App;

require "vendor/autoload.php";


use Illuminate\Database\Capsule\Manager;
use Dotenv\Dotenv;

class Bootstrap
{
    protected static $connManager = null;

    public static function boot()
    {
        $dotenv = new Dotenv(__DIR__);

        $dotenv->load();

        if (!isset(static::$connManager)) {

            static::$connManager = new Manager;


            static::$connManager->addConnection([

                "driver" => getenv('DB_DRIVER'),

                "host" => getenv('DB_HOST'),

                "database" => getenv('DB_NAME'),

                "username" => getenv('DB_USER'),

                "password" => getenv('DB_PASSWORD')

            ]);

            static::$connManager->setAsGlobal();
            static::$connManager->bootEloquent();
            static::$connManager->bootEloquent();
        }
    }
}

