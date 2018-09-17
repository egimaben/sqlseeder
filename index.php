<?php
require "vendor/autoload.php";
use App\Seeder;
$seeder = new Seeder(__DIR__);
$seeder->seed();
