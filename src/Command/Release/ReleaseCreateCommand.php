<?php

namespace Sprig\Command\Release;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Sprig\Repository\ReleaseBranch;

class ReleaseCreateCommand extends Command
{
    protected $name = 'release:create';
    protected $description = 'Create new release branch';

    protected function configure()
    {
        $this
            ->setName($this->name)
            ->setDescription($this->description)
            ->addArgument('name', InputArgument::REQUIRED, 'Release name')
            ->addOption(
                'ver',
                null,
                InputOption::VALUE_REQUIRED,
                'release version number'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $version = $input->getOption('ver');

        $repository = new ReleaseBranch;
        $repository->create_branch($name, $version);

        $output->writeln('create release branch '  .$version . ' - '. $name);
    }
}