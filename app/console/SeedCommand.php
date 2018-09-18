<?php
/**
 * Created by PhpStorm.
 * User: benedictayiko
 * Date: 17/09/2018
 * Time: 18:00
 */

namespace App\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Core\App;
use App\Core\Seeder;
use Exception;

class SeedCommand extends Command
{

    protected function configure()
    {

        $this->setName("sql:seed");

        $this->setDescription('Seeds an sql database depending on the provided configuration');

    }

    /**
     * Here all logic happens
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        App::put('root', getcwd());

        try {
            if (is_file($seedClass = App::get('root') . '/database/seeds/MySeeder.php')) {

                require $seedClass;

                $primarySeeder = new \MySeeder();

                if(!($primarySeeder instanceof Seeder)){

                    throw new Exception("Entry class $seedClass must be a sub-class of \App\Core\Seeder");

                }

                $primarySeeder->seed();

                return 0;

            } else {

                throw new Exception("Required entry class $seedClass not found");

            }
        } catch (Exception $e) {

            $output->writeln($e->getMessage());

            return -1;
        }

    }
}