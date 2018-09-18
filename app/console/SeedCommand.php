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
        echo "\ncurrent dir::" . __DIR__;
        echo "\npwd::" . getcwd();
        $root = App::get('root');

        $output->writeln("\nConsole application executed, project root is $root");
        return 0;
    }
}