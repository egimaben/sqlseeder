<?php
/**
 * Created by PhpStorm.
 * User: benedictayiko
 * Date: 17/09/2018
 * Time: 11:36
 */

namespace App\Core;

use Exception;

abstract class Seeder
{

    function __construct()
    {

        try {

            Bootstrap::boot();

        } catch (Exception $e) {

            throw $e;

        }

    }

    final public function invoke($clazzArr)
    {
        foreach ($clazzArr as $clazz) {

            $classInstance = new $clazz();

            if(!($classInstance instanceof Seeder)){

                throw new Exception("One or more seeder classes is not an instance of App\Core\Seeder::$clazz");

            }

            $classInstance->seed();
        }
    }

    abstract public function seed();


}
