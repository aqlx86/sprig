<?php

namespace Sprig\Repository;

use Naneau\SemVer\Parser;

class BranchVersion
{
    protected $version;

    public function __construct($version)
    {
        $this->version = Parser::parse($version);
    }

    public function next()
    {
        $next = $this->version;

        $next->setMajor($next->getMajor() + 1);

        return $next;
    }

    public function __toString()
    {
        return $this->version->getOriginalVersion();
    }
}