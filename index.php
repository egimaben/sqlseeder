<?php
require "vendor/autoload.php";
use App\Seeder;
$seeder = new Seeder('mysql','localhost','todo','root','');
$seeder->seed();