<?php

namespace Sprig;

use Sprig\Versions;
use Gioffreda\Component\Git\Git;

class Repository
{
    protected $git;

    public function __construct()
    {
        $this->git = Git::create('/Users/plus65ph-01/Code/winfun88');
    }

    public function fetch()
    {
        $this->git->fetch();
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

        $versions = new Versions($branches);

//        $l = $versions->current();

//        print_r($l->getMinor());

        return (array) $versions->get();
    }

    public function new_feature_version()
    {

    }

    public function releases()
    {

    }

    public function hotfixes()
    {

    }
}