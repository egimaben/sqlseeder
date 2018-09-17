<?php
/**
 * Created by PhpStorm.
 * User: benedictayiko
 * Date: 17/09/2018
 * Time: 11:36
 */

namespace App;


/**
 * Class Seeder
 * @package App
 * how i want someone to use my package
 * 1. composer require
 * 2. install
 * 3. extend seeder
 * 4. override the seed method, whatever u write there will be executed while seeding
 * 5. check for .env file in user's home dir
 * 6. read configs for connecting to db
 * 7. Report if db connection fails and drop process
 * 8. give bootstrapped db class to user to use for database querying
 *
 * -when seeder is instantiated by the child class, call bootstrap to create db object
 * -now seeder has a db object for the child class to use
 * -seed method runs and does whatever u want
 * -call invoke method from within run and pass other seeder classes, i will just instantiate and invoke their run methods
 * -drop .env file idea, allow user to read his configs in his own way and only give me values via constructor
 */
class Seeder
{
    function __construct()
    {
        Bootstrap::boot();

    }
    function seed(){
//        var_dump(DB::table('person')->get());
        var_dump(DB::table('person')->insert(['name'=>'enigma','age'=>39]));
    }


}
