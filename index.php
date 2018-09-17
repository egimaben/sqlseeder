<?php
require "vendor/autoload.php";

use App\Core\Seeder;
use App\Database\DB;
use App\Core\App;

class AnotherSeeder extends Seeder
{
    public function seed()
    {
//        var_dump(DB::table('person')->insert(['name'=>'anzako','age'=>13]));
        echo "Project root is ".App::get('root'), "\n";
        echo "\nanother seeder has run";
    }
}

class MySeeder extends Seeder
{
    function __construct($projectRoot)
    {

        parent::__construct($projectRoot);

    }

    public function seed()
    {
        echo "\nmy seeder has run";
        $this->invoke([AnotherSeeder::class]);

    }
}

$seeder = new MySeeder(__DIR__);
$seeder->seed();
