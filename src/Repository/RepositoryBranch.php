<?php

namespace Sprig\Repository;

use Sprig\Repository\Repository;

class RepositoryBranch
{
    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function branches()
    {
        $branches = [];

        foreach ($this->git->getBranches() as $branch => $value)
        {
            $name = substr($branch, strrpos($branch, '/'));

            $excluded_branches = ['master', '/master', '/HEAD'];

            if (in_array($name, $excluded_branches))
                continue;

            $branches[] = $name;
        }

        return $branches;
    }

    public function features()
    {
        $branches = array_map(function($value) {

            if (substr($value, 1, 1) == 'f')
                return substr($value, 2);

        }, $this->branches());

        return array_filter($branches);
    }

    public function releases()
    {

    }

    public function hotfixes()
    {

    }
}