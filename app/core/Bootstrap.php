<?php

namespace App\Core;

require "vendor/autoload.php";


use Illuminate\Database\Capsule\Manager;

use Dotenv\Dotenv;

use Exception;

class Bootstrap
{
    protected static $connManager = null;

    public static function boot()
    {
        if(!is_file($env = App::get('root').'/.env')){

            throw new Exception("Required configuration file $env missing");

        }

        $dotenv = new Dotenv(App::get('root'));

        $dotenv->load();

        $dotenv->required(['DB_DRIVER','DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASSWORD']);

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

