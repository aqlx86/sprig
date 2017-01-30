<?php

namespace Sprig\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

use Sprig\Sprig;

class HelloCommand extends Command
{
    protected $name = 'hello';
    protected $description = 'hello command';

    protected function configure()
    {
        $this
            ->setName($this->name)
            ->setDescription($this->description);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sprig = new Sprig;

        $output->writeln('Hello World');
    }
}