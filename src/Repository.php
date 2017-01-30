<?php

namespace Sprig;

use Sprig\Versions;
use Gioffreda\Component\Git\Git;

use Naneau\SemVer\Sort;

use Sprig\Repository\Branch;
use Sprig\Repository\BranchVersion;

abstract class Repository
{
    protected $git;

    protected $base;

    protected $branches = [];

    public function __construct()
    {
        $this->git = Git::create('/Users/plus65ph-01/Code/tests/dummy');

        $this->load_branch_list();
    }

    public function fetch()
    {
        $this->git->fetch();
    }

    public function load_branch_list()
    {
        $branches = [];

        foreach ($this->git->getBranches() as $branch => $value)
        {
            $branch = str_replace('remotes/origin/', '', $branch);

            $excluded_branches = ['master', '/master', '/HEAD'];

            if (in_array($branch, $excluded_branches))
                continue;

            $name = substr($branch, strrpos($branch, '/') + 1);

            if (substr($branch, 0, strrpos($branch, '/')) == $this->base)
                $branches[] = $name;
        }

        $branches = array_unique($branches);

        // $branches = Sort::sort($branches);

        //$lists = [];

        foreach ($branches as $branch)
        {
            $this->branches[] = new Branch($this->base, $branch);
        }
    }

    public function current()
    {
        return end ($this->branches);
    }

    abstract public function create_branch($name, $version);

    abstract public function next_version();
}