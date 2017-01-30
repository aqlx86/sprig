<?php

namespace Sprig\Repository;

use Sprig;

class ReleaseBranch extends Sprig\Repository
{
    protected $base = 'release';

    public function branches()
    {
        return $this->branches;
    }

    public function create_branch($name, $version)
    {
        $branch = new Branch($this->base, $name, new BranchVersion($version));

        $this->git
            ->checkout('master')
            ->branchAdd((string) $branch)
            ->checkout(((string) $branch));
    }

    public function next_version()
    {
        $next = $this->current();

        $next->setMajor($next->getMajor() + 1);

        return $next;
    }
}