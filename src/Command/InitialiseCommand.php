<?php

namespace Sprig\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

use Gioffreda\Component\Git\Git;

class InitialiseCommand extends Command
{
    protected $name = 'initialise';
    protected $description = 'Initialise Sprig';

    protected function configure()
    {
        $this
            ->setName($this->name)
            ->setDescription($this->description);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $config_directory = getenv("HOME") . realpath('/.sprig');

        if (! file_exists($config_directory))
        {
            mkdir($config_directory);

            $output->writeln('sprig initialised');
        }

        $git = Git::create('/Users/plus65ph-01/Code/winfun88');

        print_r($git->getBranches());
    }
}