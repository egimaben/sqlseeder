<?php
/**
 * Created by PhpStorm.
 * User: benedictayiko
 * Date: 17/09/2018
 * Time: 11:36
 */

namespace App;

use Exception;
class Seeder
{
    function __construct($projectRoot)
    {

        if(!isset($projectRoot)){
            throw new Exception("projectRoot is required but not provided");
        }
        Bootstrap::boot($projectRoot);

    }
    function seed(){
//        var_dump(DB::table('person')->get());
        var_dump(DB::table('person')->insert(['name'=>'enigma','age'=>39]));
    }


}
