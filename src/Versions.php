<?php

namespace Sprig;

use Naneau\SemVer\Sort;
use Naneau\SemVer\Parser;

class Versions
{
    protected $versions;

    public function __construct(array $versions)
    {
        $this->versions = $this->sort_versions($versions);
    }

    protected function sort_versions($versions)
    {
        foreach ($versions as $i => $version)
        {
            try
            {
                Parser::parse($version);
            }
            catch (\InvalidArgumentException $e)
            {
                unset ($versions[$i]);
            }
        }

        return Sort::sort($versions);
    }

    public function get()
    {
        return $this->versions;
    }

    public function next($version)
    {
        return $version->next();
    }

    public function current()
    {
        return end($this->versions);
    }
}