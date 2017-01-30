<?php

namespace Sprig\Command\Feature;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

use Gioffreda\Component\Git\Git;

class CreateCommand extends Command
{
    protected $name = 'feature:create';
    protected $description = 'Create new feature branch';

    protected function configure()
    {
        $this
            ->setName($this->name)
            ->setDescription($this->description);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $git = Git::create('./');

        print_r($git->featureList());

        $output->writeln('Hello World');
    }
}