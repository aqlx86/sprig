<?php

namespace Sprig\Repository;

use Sprig\Repository\BranchVersion;

class Branch
{
    private $base;
    private $name;
    private $version;

    public function __construct($base, $name)
    {
        $this->base = $base;
        $this->name = $name;

        $this->version = new BranchVersion($name);
    }

    public function version()
    {
        return $this->version;
    }

    public function __toString()
    {
        return sprintf('%s/%s', $this->base, $this->name);
    }
}