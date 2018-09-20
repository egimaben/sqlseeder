# SQLSeeder

## Install

Create a project directory:
``` bash
$ mkdir myseeder && cd myseeder
```
Add `egimaben\sqlseeder` as a dependency:

``` bash
composer require egimaben\sqlseeder
```
My demo here uses Faker for generating data, so you will need to require it as well:
``` bash
composer require fzaninotto/faker"
```
## Usage

Create `database\seeds` directory structure in your project root and create a primary seeder class whose name must be `database\seeds\MySeeder.php` and must implement `App\Core\Seeder`. Any other seeder classes can be invoked from this class' `seed` method. `App\Database\DB` is mirror of `Illuminate\Database\Capsule\Manager` and is accessible you the client, see examples below:
### Seeder 1: database/seeds/TaskTableSeeder.php

``` php
<?php

use App\Core\Seeder;
use App\Database\DB;

class TaskTableSeeder extends Seeder
{
    public function seed()
    {
        $faker = \Faker\Factory::create();

        echo "Seeding tasks table\n";

        for ($i = 0; $i < 50; $i++) {

            DB::table('tasks')->insert(['description' => $faker->name, 'done' => 0]);

        }
    }
}
```
### Seeder 2: database/seeds/PersonTableSeeder.php

``` php
<?php


use App\Core\Seeder;

use App\Database\DB;

class PersonTableSeeder extends Seeder
{

    public function seed()
    {
        $faker = \Faker\Factory::create();

        echo "Seeding person table\n";

        for ($i = 0; $i < 50; $i++) {

            DB::table('person')->insert(['name' => substr($faker->name, 0, 20), 'age' => $i]);

        }

    }
}
```

### Primary Seeder: database/seeds/MySeeder.php

``` php
<?php
use App\Core\Seeder;

class MySeeder extends Seeder
{

    public function seed()
    {
        $this->invoke([PersonTableSeeder::class, TaskTableSeeder::class]);

    }

}
```
You must provide a `.env` file at the project root with the following mandatory configs:
``` props
DB_DRIVER = 'mysql'
DB_HOST = 'localhost'
DB_NAME = 'todo'
DB_USER = 'root'
DB_PASSWORD = ''

```
When all is set, run the following:

``` bash
./vendor/bin/console sql:seed
```
## Architecture Diagram
<p>&nbsp;</p>
<img class="center-img" alt="SQLSeeder Architecture diagram" src="https://github.com/egimaben/sqlseeder/blob/master/seederarch.jpg">
<p>&nbsp;</p>

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email egimaben@gmail.com instead of using the issue tracker.

## Credits

- [Benedict Egima][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/egimaben/sqlseeder.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/egimaben/sqlseeder/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/egimaben/sql_seeder.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/egimaben/sql_seeder.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/egimaben/sql_seeder.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/egimaben/sql_seeder
[link-travis]: https://travis-ci.org/egimaben/sql_seeder
[link-scrutinizer]: https://scrutinizer-ci.com/g/egimaben/sql_seeder/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/egimaben/sql_seeder
[link-downloads]: https://packagist.org/packages/egimaben/sql_seeder
[link-author]: https://github.com/egimaben
[link-contributors]: ../../contributors
