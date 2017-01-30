<?php

namespace Sprig\Command\Release;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

use Sprig\Sprig;
use Sprig\Repository\ReleaseBranch;

class ReleaseBranchesCommand extends Command
{
    protected $name = 'release:branches';
    protected $description = 'release branches';

    protected function configure()
    {
        $this
            ->setName($this->name)
            ->setDescription($this->description);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $release = new ReleaseBranch;

        $table = new Table($output);

        $table->setHeaders(['Version']);

        foreach ($release->branches() as $branch)
        {
            $table->addRow([$branch]);
        }

        $table->render();
    }
}