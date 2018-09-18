<?php
/**
 * Created by PhpStorm.
 * User: benedictayiko
 * Date: 17/09/2018
 * Time: 11:36
 */

namespace App\Core;

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

            $classInstance->seed();
        }
    }

    final public function runSeeds()
    {
        $this->seed();
    }

    abstract public function seed();


}
