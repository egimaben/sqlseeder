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
    private $projectRoot;

    function __construct($projectRoot)
    {


        if (!isset($projectRoot)) {

            throw new Exception("projectRoot is required but not provided");
        }
        $this->projectRoot = $projectRoot;

        App::put('root',$projectRoot);

        Bootstrap::boot($projectRoot);

    }

    final public function invoke($clazzArr)
    {
        foreach ($clazzArr as $clazz) {

            $classInstance = new $clazz($this->projectRoot);

            $classInstance->seed();
        }
    }

    final public function runSeeds()
    {
        $this->seed();
    }

    abstract public function seed();


}
